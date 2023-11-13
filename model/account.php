<?php
function account_all() {
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

function login ($username, $password) {
    $sql = "SELECT * FROM users WHERE user_name = '$username' AND `password` = '$password'";
    $account =  pdo_query_one($sql);
    return $account;
   
}

function logout() {
    if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != "") {
        session_unset();
    }
}