<!-- Bismillah -->
<!-- Semoga ilmunya barokah -->

<?php
session_start();
require 'connection.php';
    // cek cookie
    if(isset($_COOKIE['op0']) && isset($_COOKIE['op1'])) {
        $op0 = $_COOKIE['op0'];
        $op1 = $_COOKIE['op1'];

        // ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT USERNAME_ADMIN FROM admin WHERE ID_ADMIN = $op0");
        $row    = mysqli_fetch_assoc($result);
    
        // cek cookie dan username
        if( $op1 === hash('sha256', $row['USERNAME_ADMIN'])) {
            $_SESSION['login'] = true;
        }
    }

    if(isset($_SESSION["login"])) {
        header("Location: data_plg.php");
        exit;
    }
    
    // cek login
    if(isset($_POST["login"])){
        global $conn;

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM admin WHERE USERNAME_ADMIN = '$username'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["PASSWORD_ADMIN"])) {
                
                // set session
                $_SESSION["login"] = true;
                // set ingat saya
                if(isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('op0', $row['ID_ADMIN'], time() + 60);
                    setcookie('op1', hash('sha256', $row["USERNAME_ADMIN"]), time() + 60);
                }

                header("Location: data_plg.php");
                exit;

            } else {
                echo "<script>
                        alert('Username atau Password salah/belum terdaftar')    
                    </script>";
            }
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