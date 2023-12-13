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

// Tìm tài khoản quên mật khẩu 

function sendmail ($email) {
    $sql = "SELECT * FROM users WHERE email='$email'";
    return pdo_query_one($sql);
}
// quên mật khẩu

function sendPass($email, $username, $password)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '51da78ff49ebc5';                     //SMTP username
        $mail->Password   = '07f3ec461be386';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau@example.com', 'Mailer');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = 'Mat khau cua ban la: ' . $password;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// đổi thông tin user

function changeinfo($user_id, $email, $phone, $address) {
    $sql = "UPDATE users SET email = '$email', phone = '$phone', `address` = '$address' WHERE  user_id = '$user_id'";
    pdo_execute($sql);
}

// cấp quyền truy cập
function capquyen($user_id) {
    $sql = "UPDATE users SET user_role = 1
    WHERE user_id = '$user_id'";
    pdo_execute($sql);
}
// hạ quyền truy cập
function haquyen($user_id) {
    $sql = "UPDATE users SET user_role = 0
    WHERE user_id = '$user_id'";
    pdo_execute($sql);
}

