<!-- Bismillah -->
<!-- Semoga ilmunya barokah -->

<?php
require 'function.php';

if( isset($_POST["register"])) {
    if(registrasi($_POST) > 0) {
        echo "<script>
                alert('admin baru berhasil ditambahkan!');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Admin</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
<h1>Registrasi Admin</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama_adm">Nama :</label>
                <input type="text" name="nama_adm" id="nama_adm" require>
            </li>
            <li>
                <label for="alamat_adm">Alamat :</label>
                <textarea name="alamat_adm" id="alamat_adm" cols="30" rows="10" require></textarea>
            </li>
            <li>
                <label for="nohp_adm">No HP :</label>
                <input type="nohp_adm" name="nohp_adm" id="nohp_adm" require>
            </li>
            <li>
                <label for="foto_adm">Foto Profil:</label>
                <input type="file" name="foto_adm" id="foto_adm"> <p>ukuran gambar max 1 Mb, format harus jpg, jpeg, atau png.</p>
            </li>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" require>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" require>
            </li>
            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2" require>
            </li>
            <li>
                <button type="submit" name="register">Daftar</button>
            </li>
        </ul>
    </form>
</body>
</html>