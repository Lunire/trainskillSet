<?php

$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{4,}$/', $password)) {
    $_SESSION['message'] = 'รหัสผ่านต้องมีอย่างน้อย 4 ตัว และตัวพิมพ์เล็กและใหญ่';
} elseif ($password !== $confirm_password) {
    $_SESSION['message'] = 'Password do not match';
} elseif (updatePassword($email, $password)) {
    $_SESSION['message'] = 'Change successful!';
    header('Location: /login');
    exit;
} else {
    $_SESSION['message'] = 'Email is wrong';
}

renderView('change_password_get');