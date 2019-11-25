<?php
require 'function.php';

if(!isset($_GET["code"])) {
    exit("Gagal");
}
$code = $_GET["code"];

$getEmailQuery = mysqli_query($conn, "SELECT EMAIL_PELANGGAN FROM reset WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery) == 0) {
    echo "<script>
            alert('email tidak cocok');
        </script>";
    return false; 
}

if(isset($_POST["update"])) {
    $pswd   = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["password"]));
    $pswd2  = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["password"]));
    
    
    if($pswd !== $pswd2) {
        echo "<script>
                alert('konfirmasi password tidak cocok');
            </script>";
        return false;    
        } else {
        $pswd   = password_hash($pswd, PASSWORD_BCRYPT);
        $pswd2  = password_hash($pswd2, PASSWORD_BCRYPT); 
        $row   = mysqli_fetch_array($getEmailQuery);
        $email = $row["EMAIL_PELANGGAN"];
        
        $query = mysqli_query($conn, "UPDATE pelanggan SET PASSWORD_PELANGGAN = '$pswd' WHERE EMAIL_PELANGGAN = '$email'");

        if($query) {
            $query = mysqli_query($conn, "DELETE FROM reset WHERE code = '$code'");
            echo "<script>
                    alert('password berhasil diubah');
                </script>";
                header ("Location: login_plg.php"); 
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="password" name="password" palaceholder="Masukkan Password baru">
        <br>
        <input type="password" name="password2" palaceholder="Konfirmasi Password">
        <br>
        <button type="submit" name="update">Ubah Password</button>
    </form>
</body>
</html>