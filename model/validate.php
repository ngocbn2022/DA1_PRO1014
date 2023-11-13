<?php
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

if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $index = 0;
    if (isset($username) && $username == "") {
        $index++;
        $error1 = '* Vui lòng nhập tên tài khoản';
    }
    if (isset($password) && $password == "") {
        $index++;
        $error2 = '* Vui lòng nhập mật khẩu';
    }
    // $account = login($username, $password);
    // if (isset($account) && $account) {
    //     header("location: index.php?act=home&dangnhaptc");
    // } else {
    //     $error1 = "* Tài khoản hoặc mật khẩu không chính xác";
    //     $error2 = "* Tài khoản hoặc mật khẩu không chính xác";
    // }
}
