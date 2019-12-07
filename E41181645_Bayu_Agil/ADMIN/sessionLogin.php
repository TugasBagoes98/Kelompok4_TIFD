<?php
session_start();
require 'connection.php';
if(isset($_POST['login'])) {
    
    $email    = $_POST["email"];
    $password = $_POST["password"];
    $result   = mysqli_query($conn, "SELECT * FROM user WHERE EMAIL_USER = '$email'");
    $cek      = mysqli_num_rows($result);
    
    if($cek === 1) {
        $row  = mysqli_fetch_assoc($result);
        $id   = $row['ID_USER'];
        $nama = $row['NAMA_USER'];
        $foto = $row['FOTO_PROFIL_USER'];
        if(password_verify($password, $row['PASSWORD_USER'])){
            $_SESSION['ID_USER']   = $id;
            $_SESSION['NAMA_USER'] = $nama;
            $_SESSION['FOTO_PROFIL_USER'] = $foto;
            $_SESSION["login"] = true;
            header("Location: index.php?status=true");
        } else {
            header("Location: login.php?status=false");
        }
    } 
} else {
    echo ""; 
}