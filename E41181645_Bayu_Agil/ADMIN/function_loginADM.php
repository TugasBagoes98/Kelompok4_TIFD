<?php
// session_start();
require 'connection.php';
if(isset($_POST['login'])) {

    $email    = $_POST["email"];
    $password = $_POST["password"];
    $result   = mysqli_query($conn, "SELECT * FROM user WHERE EMAIL_USER = '$email'");
    $cek      = mysqli_num_rows($result);
    
    if($cek == 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['PASSWORD_USER'])){
            header("Location: index.php?status=true");
        } else
        {
            header("Location: login.php?status=false");
        }
    } 
}

//     if(!isset($_SESSION["login"])) {
//         // cek cookie
//         if(isset($_COOKIE['op0']) && isset($_COOKIE['op1'])) {
//             $op0 = $_COOKIE['op0'];
//             $op1 = $_COOKIE['op1'];

//             // ambil username berdasarkan id
//             $result = mysqli_query($conn, "SELECT EMAIL_USER FROM user WHERE ID_USER = $op0");
//             $row    = mysqli_fetch_assoc($result);
        
//             // cek cookie dan username
//             if( $op1 === hash('sha256', $row['EMAIL_USER'])) {
//                 $_SESSION['login'] = true;
//             }
//         }
    
//         // cek login
//         if(isset($_POST['login'])){

//         $email    = $_POST["email"];
//         $password = $_POST["password"];
//         $result = mysqli_query($conn, "SELECT * FROM user WHERE EMAIL_USER = '$email'");

//         if(mysqli_num_rows($result) === 1) {
//             $row = mysqli_fetch_assoc($result);
//             if(password_verify($password, $row['PASSWORD_USER'])) {
//                 // set session
//                 $_SESSION['login'] = true;
//                 // set ingat saya
//                 if(isset($_POST['remember'])) {
//                     // buat cookie
//                     setcookie('op0', $row['ID_USER'], time() + 60);
//                     setcookie('op1', hash('sha256', $row["EMAIL_USER"]), time() + 60);
//                 }
//                 header("Location: index.php");
//             } else 
//             {
//                 header("Location: login.php");
//             }
//         }       
//     } else 
//     {
//         header("Location: login.php");    
//     }
// }
?>