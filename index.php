<?php
ob_start();
session_start();
include "global.php";
include "model/pdo.php";
include "model/category.php";
include "model/product.php";
include "model/account.php";
include "model/validate.php";
$listCategories = listCategories();
$listProduct_new_home = listProduct_new_home();
$listProduct_view_home = listProduct_view_home();
$listProduct_star_home = listProduct_star_home();
include "view/header.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include "view/home.php";
            break;
        case 'register':
            if (isset($_POST['dangky'])) {
                $accounts = account_all();
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $numberphone = $_POST['numberphone'];
                $address = $_POST['address'];
                $comfirm = $_POST['comfirm'];
                $pattern_phone = '/^(03[2-9]|07[0-9]|08[1-9]|09[0-9])[0-9]{7}$/';
                $pattern_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                $index = 0;
                if (isset($username) && $username == "") {
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
                if (!preg_match($pattern_phone, $numberphone)) { // check không đúng định dạng
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
                    if ($username == $account['user_name']) {
                        $index++;
                        $error1 = '* Tên tài khoản đã tồn tại';
                    }
                    if ($email == $account['email']) {
                        $index++;
                        $error3 = '* Email đã tồn tại';
                    }
                    if ($numberphone == $account['phone']) {
                        $index++;
                        $error4 = '* Số điện thoại đã tồn tại';
                    }
                }
                if ($index == 0) {
                    header("Location: index.php?act=login&dangkytc");
                }
            }
            include "view/login/register.php";
            break;
        case 'login':
            if (isset($_POST['dangnhap'])) {
                echo $_SESSION['user_name'];
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
            if (isset($_GET['trang']) && ($_GET['trang'] > 0)) {
                $trang = $_GET['trang'] - 1;
            } else {
                $trang = 0;
            }
            $listProduct = listProduct($category_id, $keyword,$trang, $sapxep);
            include "view/product.php";
            break;
        case 'cart':
            include "view/cart.php";
            break;
        case 'detailProduct':

            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
