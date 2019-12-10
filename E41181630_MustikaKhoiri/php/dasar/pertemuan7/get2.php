<?php
// cek apakah tidak ada data di $_GET
if( !isset($_GET["Nama"]) || 
    !isset($_GET["NIM"]) ||
    !isset($_GET["Jurusan"]) ||
    !isset($_GET["Email"]) ||
    !isset($_GET["Gambar"]) ){
    // redirect (memindahkan user dari sebuah halaman ke halaman lain)
    header("Location: get.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <ul>
        <li><img src="../img/<?= $_GET["Gambar"]; ?>"></li>
        <li><?= $_GET["Nama"]; ?></li>
        <li><?= $_GET["NIM"]; ?></li>
        <li><?= $_GET["Jurusan"]; ?></li>
        <li><?= $_GET["Email"]; ?></li>
    </ul>

    <a href="get.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>