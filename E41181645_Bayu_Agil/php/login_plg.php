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
        $result = mysqli_query($conn, "SELECT USERNAME_PELANGGAN FROM pelanggan WHERE ID_PELANGGAN = $op0");
        $row    = mysqli_fetch_assoc($result);
    
        // cek cookie dan username
        if( $op1 === hash('sha256', $row['USERNAME_PELANGGAN'])) {
            $_SESSION['login'] = true;
        }
    }

    if(isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    // cek login
    if(isset($_POST["login"])){
        global $conn;

        $username_plg = $_POST["username_plg"];
        $password_plg = $_POST["password_plg"];

        $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE USERNAME_PELANGGAN = '$username_plg'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password_plg, $row["PASSWORD_PELANGGAN"])) {
                
                // set session
                $_SESSION["login"] = true;
                // set ingat saya
                if(isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('op0', $row['ID_PELANGGAN'], time() + 60);
                    setcookie('op1', hash('sha256', $row["USERNAME_PELANGGAN"]), time() + 60);
                }

                header("Location: index.php");
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
            <button type="submit" name="login">Login</button>
        </li>
    </ul> 
    </form>
</body>
</html>