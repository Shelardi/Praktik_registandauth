<?php
session_start();
require("php/db_content.php");
$email = $_POST['email'];
$password = $_POST['password'];
$md5_password = md5($password);
$query = mysqli_query($connect, "SELECT * FROM 'users' WHERE email ='email'");
if (mysqli_num_rows($query) == 0) {
    $_SESSION['user'] = ['nick' => $email];
    mysqli_query($connect, "INSERT INTO 'users' ('email', 'password') VALUES ('{$email}', '{$md5_password}')");
    header("Location: /user.php");
} else {
    echo("Ошибка: Данный логин занят другим пользователем.");
}
?>