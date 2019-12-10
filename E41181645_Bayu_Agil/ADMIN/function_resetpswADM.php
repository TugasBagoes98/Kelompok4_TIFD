<?php
require 'connection.php';

    if(!isset($_GET["token"])) {
    exit("Gagal");
    }
    $token = $_GET["token"];

    $getEmailQuery = mysqli_query($conn, "SELECT EMAIL_USER FROM reset WHERE token='$token'");
    if(mysqli_num_rows($getEmailQuery) == 0) {
    echo "<script>
            alert('email tidak cocok');
        </script>";
    return false; 
    }

    if(isset($_POST["update"])) {
    $pswd   = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["password"]));
    $pswd2  = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["password2"]));
    
    
    if($pswd !== $pswd2) {
        echo "<script>
                alert('Konfirmasi password tidak cocok');
            </script>";
        return false;    
        } else {
        $pswd   = password_hash($pswd, PASSWORD_BCRYPT);
        $pswd2  = password_hash($pswd2, PASSWORD_BCRYPT); 
        $row   = mysqli_fetch_array($getEmailQuery);
        $email = $row["EMAIL_USER"];
        
        $query = mysqli_query($conn, "UPDATE user SET PASSWORD_USER = '$pswd' WHERE EMAIL_USER = '$email'");

        if($query) {
            $query = mysqli_query($conn, "DELETE FROM reset WHERE token = '$token'");
            echo "<script>
                    alert('password berhasil diubah');
                </script>";
                header ("Location: login.php"); 
                exit;
            } else {
                echo "<script>
                        alert('konfirmasi password tidak cocok');
                    </script>";
            return false; 
        }
    }
}
?>
