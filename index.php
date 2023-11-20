<?php
ob_start();
session_start();
include "global.php";
include "./model/pdo.php";
include "./model/category.php";
include "./model/product.php";
include "./model/account.php";
include "./model/comment.php";
$listCategories = listCategories();
$listProduct_new_home = listProduct_new_home();
$listProduct_view_home = listProduct_view_home();
include "view/header.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include "view/home.php";
            break;
        case 'admin':
            header("Location: admin/index.php");
            break;
        case 'register':
            if (isset($_POST['dangky'])) {
                $accounts = account_all();
                $user_name = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['numberphone'];
                $address = $_POST['address'];
                $comfirm = $_POST['comfirm'];
                $pattern_phone = '/^(03[2-9]|07[0-9]|08[1-9]|09[0-9])[0-9]{7}$/';
                $pattern_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                $index = 0;
                if (isset($user_name) && $user_name == "") {
                    $index++;
                    $error1 = '* Vui lòng nhập tên tài khoản';
                }
                if (isset($password) && $password == "") {
                    $index++;
                    $error2 = '* Vui lòng nhập mật khẩu';
                } else if (strlen($password) <= 6) {
                    $error2 = '* Vui lòng nhập mật khẩu dài hơn 6 ký tự';
                }

                if (!preg_match($pattern_email, $email)) { // check không đúng định dạng
                    $index++;
                    $error3 = "* Email không hợp lệ";
                }
                if (!preg_match($pattern_phone, $phone)) { // check không đúng định dạng
                    $index++;
                    $error4 = "* Số điện thoại không hợp lệ";
                }

                if (isset($address) && $address == "") {
                    $index++;
                    $error5 = '* Vui lòng nhập địa chỉ';
                }
                if (isset($comfirm) && $comfirm == "") {
                    $index++;
                    $error6 = '* Vui lòng nhập xác nhận mật khẩu';
                }
                if ($comfirm != $password) {
                    $index++;
                    $error7 = 'Xác nhận mật khẩu sai';
                }
                foreach ($accounts as $account) {
                    if ($user_name == $account['user_name']) {
                        $index++;
                        $error1 = '* Tên tài khoản đã tồn tại';
                    }
                    if ($email == $account['email']) {
                        $index++;
                        $error3 = '* Email đã tồn tại';
                    }
                    if ($phone == $account['phone']) {
                        $index++;
                        $error4 = '* Số điện thoại đã tồn tại';
                    }
                }
                if ($index == 0) {
                    register($user_name, $password, $email, $phone, $address);
                    header("Location: index.php?act=login&dangkytc");
                }
            }
            include "view/login/register.php";
            break;
        case 'login':
            if (isset($_POST['dangnhap'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $account = login($username, $password);
                if ($account != false) {
                    $_SESSION['user_name'] = $username;
                    $_SESSION['user_id'] = $account['user_id'];
                    $_SESSION['user_role'] = $account['user_role'];
                    header("Location: index.php?act=home&dangnhaptc");
                } else {
                    $error1 = "* Tài khoản hoặc mật khẩu không chính xác";
                    $error2 = "* Tài khoản hoặc mật khẩu không chính xác";
                }
                if (isset($username) && $username == "") {
                    $error1 = '* Vui lòng nhập tên tài khoản';
                }
                if (isset($password) && $password == "") {
                    $error2 = '* Vui lòng nhập mật khẩu';
                }
            }
            include "view/login/login.php";
            break;
        case 'logout':
            logout();
            header("Refresh: 0; URL=index.php?dangxuattc");
            break;
        case 'misspassword':
            include "view/login/misspassword.php";
            break;
        case 'changepassword':
            if (isset($_POST['changepassword'])) {
                $password = $_POST['password'];
                $newpassword = $_POST['newpassword'];
                $comfirm = $_POST['comfirm'];
                $user_id = $_SESSION['user_id'];
                $taikhoan = load_account($user_id, $password);
                if (isset($taikhoan) && $taikhoan) {
                    if (strlen($newpassword) > 6) {
                        if ($newpassword == $comfirm) {
                            changepassword($user_id, $newpassword);
                            header("Location: index.php?act=changepassword&changepasswordtc");
                        } else {
                            $error1 = 'Xác nhận mật khẩu không chính xác';
                        }
                    } else {
                        $error1 = 'Vui lòng nhập mật khẩu mới dài hơn 6 ký tự';
                    }
                } else {
                    $error2 = 'Mật khẩu không chính xác';
                }
            }
            include "view/info/changepassword.php";
            break;
        case 'product':
            if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
                $keyword = $_POST['keyword'];
            } else {
                $keyword = "";
            }
            if (isset($_GET['sapxep']) &&  $_GET['sapxep'] != "") {
                $sapxep = $_GET['sapxep'];
            } else {
                $sapxep = "";
            }
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                $category_id = $_GET['category_id'];
            } else {
                $category_id = 0;
            }
            if (isset($_GET['page']) && ($_GET['page'] > 0)) {
                $trang = $_GET['page'] - 1;
            } else {
                $trang = 0;
            }
            $listProduct = listProduct($category_id, $keyword, $trang, $sapxep);
            include "view/product.php";
            break;
        case 'cart':
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $size = $_POST['selectedsize'];
            $color = $_POST['selectedcolor'];
            $quantity = $_POST['quantity'];
            echo $product_id;
            echo $product_name;
            echo $image;
            echo $price;
            echo $size;
            echo $color;
            echo $quantity;
            include "view/cart.php";
            break;
        case 'detailProduct':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $_SESSION['product_id'] = $_GET['product_id'];
                $product_id = $_GET['product_id'];
                $product = product_one($product_id);
                $comments = comments($product_id);
            }
            include "view/detailProduct.php";
            break;
        case 'info':
            $user_id = $_SESSION['user_id'];
            $account = load_account_info($user_id);
            include "view/info/info.php";
            break;
        case 'changeinfo':
            $user_id = $_SESSION['user_id'];
            $account = load_account_info($user_id);
            include "view/info/changeinfo.php";
            break;
        case 'oders':
            include "view/info/oderinfo.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
