<?php
require 'function.php';
session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: login_adm.php");
        exit;
    }

// pagination
// konfigurasi
$jumlahDataPerhalaman = 10;
$jumlahData           = count(Data_plg("SELECT * FROM pelanggan"));
$jumlahHalaman        = ceil($jumlahData/$jumlahDataPerhalaman);
$halamanAktif         = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData             = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$Pelanggan = Data_plg("SELECT * FROM pelanggan LIMIT $awalData, $jumlahDataPerhalaman");
// $result = mysqli_query($conn, "SELECT * FROM pelanggan")
// tombol cari diklik
if(isset($_POST["bt_cari"])) {
    $Pelanggan = cari($_POST["cari"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pelanggan</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Data Pelanggan</h1>

    <form action="" method="post">
        <input type="text" name="cari" id="cari" size="50" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="bt_cari" id="bt_cari">Cari</button>
    </form>
    <br>
    
    <!-- navigasi halaman -->
    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <a href=""><?= $i; ?></a>
    <?php endfor; ?>

    <table border="1" cellpading="10" cellspacing="0">
        <tr>
            <th>NO.</th>
            <th>AKSI</th>
            <th>NIK</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>NO HP</th>
            <th>EMAIL</th>
            <th>FOTO KTP</th>
            <th>FOTO PROFIL</th>
        </tr>
    <?php $i = 1;?>
    <?php foreach($Pelanggan as $row) : ?>
        <tr>    
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><?= $row["NIK"]; ?></td>
            <td><?= $row["NAMA_PELANGGAN"]; ?></td>
            <td><?= $row["ALAMAT_PELANGGAN"]; ?></td>
            <td><?= $row["NOHP_PELANGGAN"]; ?></td>
            <td><?= $row["EMAIL_PELANGGAN"]; ?></td>
            <td><img src="img/<?= $row["FOTO_KTP"]; ?>" alt="foto ktp" width="100"></td>
            <td><img src="img/<?= $row["FOTO_KTP"]; ?>" alt="foto ktp" width="100"></td>
        </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </table>
    
    
</body>
</html>