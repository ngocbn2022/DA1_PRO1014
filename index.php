<?php
ob_start();
session_start();
include "global.php";
include "./model/pdo.php";
include "./model/category.php";
include "./model/product.php";
include "./model/account.php";
include "./model/order.php";
include "./model/comment.php";
include "./model/variant.php";
$listCategories = listCategories();
$listProduct_new_home = listProduct_new_home();
$listProduct_sale_home = listProduct_sale_home();
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
        case 'forgotpassword':
            if (isset($_POST['submit_forgot'])) {
                $email = $_POST['email'];
                $account = sendmail ($email);
                if ($account != false) {
                    sendPass($email, $account['user_name'], $account['password']);
                    $err = "Gửi email thành công";
                } else {
                    $err = "Email không tồn tại";
                }
            }
            include "view/login/forgotpassword.php";
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
            $page = (int)countproduct();
            $listProduct = listProduct($category_id, $keyword, $trang);
            include "view/product.php";
            break;

        case 'detailProduct':
            if (isset($_GET['product_code'])) {
                $_SESSION['product_id'] = $_GET['product_id'];
                $product_id = $_GET['product_id'];
                $product_code = $_GET['product_code'];
                if (isset($_POST['click_sendrate'])) {
                    $username = $_SESSION['user_name'];
                    $content = $_POST['content'];
                    $star = $_POST['rate'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh'); // set ve gio vietnam
                    $time = date('Y/m/d');
                    insert_comment($username, $content, $time, $star, $product_id);
                    header("Location: " . $url);
                }
                $sizes = loadall_size_variant($product_code);
                $colors = loadall_color_variant($product_code);
                $rate = select_avg_rate($product_id);
                $countrate = count_rate($product_id);
                $countcomment = count_comment($product_id);
                $product = product_one($product_id);
                $list_product_same = list_product_same($product['category_id'], $product_id);
                tangview($product_id);
            }
            include "view/detailProduct.php";
            break;
        case 'cart':
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            } else {
                header("Location: index.php?act=login");
            }
            if (isset($_POST['addtocart'])) {
                $product_code = $_GET['product_code'];
                $product_name = $_POST['product_name'];
                $image = $_POST['image'];
                $price = $_POST['price'];
                $color_id = $_POST['selectedcolor'];
                $size_id = $_POST['selectedsize'];
                $quantity = $_POST['quantity'];
                $variant = load_variant($product_code, $color_id, $size_id);
                $variant_id = $variant['variant_id'];
                addtocart($quantity, $user_id, $variant_id);
                header("Location: index.php?act=cart");
            }
            $carts = load_cart($user_id);
            include "view/cart.php";
            break;
        case 'delcart':
            if (isset($_GET['cart_id']) && $_GET['cart_id'] > 0) {
                $cart_id = $_GET['cart_id'];
                delcart($cart_id);
            }
            header("Location: index.php?act=cart");
            break;
        case 'info':
            $user_id = $_SESSION['user_id'];
            $account = load_account_info($user_id);
            include "view/info/info.php";
            break;
        case 'changeinfo':
            $pattern_phone = '/^(03[2-9]|07[0-9]|08[1-9]|09[0-9])[0-9]{7}$/';
            $pattern_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            $user_id = $_SESSION['user_id'];
            $account = load_account_info($user_id);
            if (isset($_POST['updateinfo'])) {
                $index = 0;
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                if (!preg_match($pattern_email, $email)) { // check không đúng định dạng
                    $index++;
                    $error1 = "* Email không hợp lệ";
                }
                if (!preg_match($pattern_phone, $phone)) { // check không đúng định dạng
                    $index++;
                    $error2 = "* Số điện thoại không hợp lệ";
                }

                if (isset($address) && $address == "") {
                    $index++;
                    $error3 = '* Vui lòng nhập địa chỉ';
                }
                if ($index == 0) {
                    changeinfo($user_id, $email, $phone, $address);
                    header("Location: index.php?act=info&changeinfotc");
                }
            }
            include "view/info/changeinfo.php";
            break;
        case 'order':
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            } else {
                header("Location: index.php?act=login");
            }
            $account = load_account_info($user_id);
            $carts = load_cart($user_id);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ordername = date('Ymdhis') . $user_id;
            $ordertime = date('h:i:s - d:m:Y');
            if (isset($_POST['addtoorder'])) {
                $product_code = $_GET['product_code'];
                $product_name = $_POST['product_name'];
                $product_image = $_POST['image'];
                $color_id1 = $_POST['selectedcolor'];
                $size_id1 = $_POST['selectedsize'];
                $size = load_size($size_id1);
                $color = load_color($color_id1);
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
            }
            if (isset($_POST['thanhtoan'])) {
                $payment = 1;
                $total = $_POST['total'];
                $product_code = $_POST['product_code'];
                $color = $_POST['color'];
                $size = $_POST['size'];
                $quantity = $_POST['quantity'];
                $dathangthanhcong = 'dathangtc';
                if ($color != 0 && $size != 0) {
                    $variant = load_variant($product_code, $color, $size);
                    $variant_id = $variant['variant_id'];
                    addtocart_tt($quantity, $user_id, $variant_id, $ordername);
                    dathang($ordername, $payment, $total, $ordertime, $user_id);
                } else {
                    dathang($ordername, $payment, $total, $ordertime, $user_id);
                    adddetailorder($ordername, $user_id);
                }
                header("Location: index.php?act=home&dathangtc");
            }

            if (isset($_POST['thanhtoanmomo'])) {
                $_SESSION['total'] = $_POST['total'];
                $_SESSION['product_code'] = $_POST['product_code'];
                $_SESSION['color'] = $_POST['color'];
                $_SESSION['size'] = $_POST['size'];
                $total = $_SESSION['total'];
                include "view/momocheckout.php";
            }
            if (isset($_GET['thanhtoanmomotc'])) {
                $payment = 2;
                $total1 = $_SESSION['total'];
                $product_code = $_SESSION['product_code'];
                $color = $_SESSION['color'];
                $size = $_SESSION['size'];
                $quantity = $_SESSION['quantity'];
                if ($color != 0 && $size != 0) {
                    $variant = load_variant($product_code, $color, $size);
                    $variant_id = $variant['variant_id'];
                    addtocart_tt($quantity, $user_id, $variant_id, $ordername);
                    dathang($ordername, $payment, $total1, $ordertime, $user_id);
                } else {
                    dathang($ordername, $payment, $total1, $ordertime, $user_id);
                    adddetailorder($ordername, $user_id);
                }
                unset($total1);
                unset($product_code);
                unset($color);
                unset($size);
                unset($quantity);
                header("Location: index.php?act=home");
            }
            include "view/checkout.php";
            break;
        case 'oderinfo':
            $user_id = $_SESSION['user_id'];
            $listorders = loadall_order_client($user_id);
            if (isset($_POST['huydonhang'])) {
                $order_id = $_GET['order_id'];
                cancelorder($order_id);
                header("Location: index.php?act=oderinfo");
            }
            include "view/info/oderinfo.php";
            break;
        case 'detailorder':
            $ordername = $_GET['order_name'];
            $listproduct = load_detailorder($ordername);
            include "view/info/detailorder.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
