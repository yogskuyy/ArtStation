<?php

session_start();

$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

$stored_email = 'rakaprayoga@gmail.com';
$stored_password = '12345678';

if ($email === $stored_email && $password === $stored_password) {
    // Set session variables
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    // Redirect ke halaman setelah login berhasil
    header("Location: TUGAS2.php");
    echo "<script>alert('Login Berhasil.');</script>";
    exit();
} else {
    // Login gagal
    echo "<script>alert('Login gagal. Silakan coba lagi.');</script>";
}

?>
