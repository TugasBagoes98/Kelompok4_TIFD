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
if(isset($_POST["cari_pelanggan"])) {
    $pelanggan = cari_pelanggan($_POST["keyword"]);
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
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari_pelanggan">Cari</button>
    </form>
    <br>
    
    <!-- navigasi halaman -->
    <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i<= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>

    <br>

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
               <a href="hapus_plg.php?NIK=<?= $row["NIK"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data?');">Hapus</a>
            </td>
            <td><?= $row["NIK"]; ?></td>
            <td><?= $row["NAMA_PELANGGAN"]; ?></td>
            <td><?= $row["ALAMAT_PELANGGAN"]; ?></td>
            <td><?= $row["NOHP_PELANGGAN"]; ?></td>
            <td><?= $row["EMAIL_PELANGGAN"]; ?></td>
            <td><img src="img/<?= $row["FOTO_KTP"]; ?>" alt="foto ktp" width="100"></td>
            <td><img src="img/<?= $row["FOTO_PROFIL"]; ?>" alt="foto profil" width="100"></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
    </table>
    
    
</body>
</html>