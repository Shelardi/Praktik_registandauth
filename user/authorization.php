<?php
session_start();
require("php/db_content.php");

$email = $_POST['email'];
$password = $_POST['password'];
$md5_password = md5($password);

$query = mysqli_query($connect, "SELECT * FROM `users` WHERE email='$email' AND password='$md5_password'");
if (mysqli_num_rows($query) > 0){

    $_SESSION['user'] = ['nick' => $email];
    header("Location: user.php");
} else {
    $_SESSION['error'] = "Ошибка: Данный логин или пароль неверен.";
    header('Location: authorization.php');
}
?>