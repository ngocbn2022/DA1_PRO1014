<?php
// hiển thị toàn bộ users
function account_all() {
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

// đăng ký
function register($user_name, $password, $email, $phone, $address ) {
    $sql = "INSERT INTO users (user_name, password, email, phone, address) 
    VALUES ('$user_name', '$password', '$email', '$phone', '$address')";
    pdo_execute($sql);
}

// đăng nhập
function login ($username, $password) {
    $sql = "SELECT * FROM users WHERE user_name = '$username' AND `password` = '$password'";
    $account =  pdo_query_one($sql);
    return $account;
   
}
// đăng xuất
function logout() {
    if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != "") {
        session_unset();
    }
}

// hiển thị tài khoản khi đăng nhập
function load_account($user_id, $password) {
    $sql = "SELECT * FROM users WHERE user_id = '$user_id' AND `password` = '$password'";
    return pdo_query_one($sql);
}

function load_account_info($user_id){
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    return pdo_query_one($sql);
}
// đổi mật khẩu
function changepassword($user_id, $newpassword) {
    $sql = "UPDATE users SET `password` = '$newpassword' WHERE user_id = '$user_id'";
    pdo_execute($sql);
}
