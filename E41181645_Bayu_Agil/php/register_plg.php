<!-- Bismillah -->
<!-- Semoga ilmunya barokah -->

<?php
    require 'function.php';

    if( isset($_POST["register1"])) {
        if(registrasiplg($_POST) > 0) {
            echo "<script>
                    alert('user baru berhasil ditambahkan!');
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
    <title>Buat Akun</title>
    <style>
        label{
            display:block;
        }
    </style>
</head>
<body>
    <h1>Buat Akun Baru</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nik">NIK :</label>
                <input type="text" name="nik" id="nik" require>
            </li>
            <li>
                <label for="nama_plg">Nama :</label>
                <input type="text" name="nama_plg" id="nama_plg"  require>
            </li>
            <li>
                <label for="almat_plg">Alamat :</label>
                <textarea name="alamat_plg" id="alamatplg" cols="30" rows="10"  require></textarea>
            </li>
            <li>
                <label for="nohp_plg">No HP :</label>
                <input type="text" name="nohp_plg" id="nohp_plg"  require>
            </li>
            <li>
                <label for="email_plg">Email :</label>
                <input type="text" name="email_plg" id="email_plg"  require>
            </li>
            <li>
                <label for="ktp_plg">Foto KTP :</label>
                <input type="file" name="ktp_plg" id="ktp_plg"  require> <p>ukuran gambar max 1 Mb, format harus jpg, jpeg, atau png.</p>
            </li>
            <li>
                <label for="foto_plg">Foto Profil :</label>
                <input type="file" name="foto_plg" id="foto_plg"  require> <p>ukuran gambar max 1 Mb, format harus jpg, jpeg, atau png.</p>
            </li>
            <li>
                <label for="username_plg">Username :</label>
                <input type="text" name="username_plg" id="username_plg"  require>
            </li>
            <li>
                <label for="password_plg">Password :</label>
                <input type="password" name="password_plg" id="password_plg"  require>
            </li>
            <li>
                <label for="password2_plg">Konfirmasi Password :</label>
                <input type="password" name="password2_plg" id="password2_plg"  require>
            </li>
            <li>
                <button type="submit" name="register1">Daftar</button>
            </li>
        </ul>
    </form>
</body>
</html>