<!-- Bismillah -->
<!-- Semoga ilmunya barokah -->

<?php
session_start();
require 'function.php'; 

    if(!isset($_SESSION["login"])) {
        if(login_plg($_POST) > 0) {
            header("Location: index.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Pelanggan</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
<h1>Login</h1>
    <form action="" method="post">
    <ul>
        <li>
            <label for="username_plg">Username :</label>
            <input type="text" name="username_plg" id="username_plg">
        </li>
        <li>
            <label for="password_plg">Password :</label>
            <input type="password" name="password_plg" id="password_plg">
        </li>
        <li>
            <label for="remember">ingat saya!</label>
            <input type="checkbox" name="remember" id="remember">
        </li>    
        <li>
            <a href="register_plg.php">Belum punya akun?, daftar disini!</a>
        </li>
        <li>
            <a href="lupa_pswd.php">Lupa password?</a>
        </li> 
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul> 
    </form>
</body>
</html>