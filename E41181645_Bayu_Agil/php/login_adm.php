<!-- Bismillah -->
<!-- Semoga ilmunya barokah -->

<?php
session_start();
require 'function.php';

    if(!isset($_SESSION["login"])) {
        if(login_adm($_POST)) {
            header("Location: data_plg.php");
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
    <title>Login</title>
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
            <label for="">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <label for="remember">ingat saya!</label>
            <input type="checkbox" name="remember" id="remember">
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul> 
    </form>
</body>
</html>