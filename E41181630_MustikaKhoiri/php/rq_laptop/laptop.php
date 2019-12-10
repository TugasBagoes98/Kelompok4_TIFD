<?php

require 'function.php';

//konfigurasi pagination
$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM laptop"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$laptop = query("SELECT * FROM laptop LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari diklik
if (isset($_POST["cari_laptop"])) {
    $laptop = cari_laptop($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Laptop</title>
    <style>
        .loader{
            width: 100px;
            position: absolute;
            top: 93px;
            left: 210px;
            z-index: -1;
            display: none;
        }
    </style>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <h1>Form Tambah Laptop</h1>

    <td><a href="tambah_laptop.php">Tambah</a></td>
    <br> <br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
        <button type="submit" name="cari_laptop" id="tombol-cari">Cari</button>

        <img src="img/loadergif.gif" class="loader">
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

    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NO.</th>
            <th>AKSI</th>
            <th>ID LAPTOP</th>
            <th>GAMBAR</th>
            <th>MERK</th>
            <th>PROCESSOR</th>
            <th>RAM</th>
            <th>HARD DISK</th>
            <th>VGA</th>
            <th>UKURAN LAYAR</th>
            <th>SOUND CARD</th>
            <th>STOK</th>
        </tr>

        <?php $i = 1;?>
        <?php foreach ($laptop as $row): ?>
        <tr>    
            <td><?= $i; ?></td>
            <td>
                <a href="ubah_laptop.php?ID_LAPTOP=<?= $row["ID_LAPTOP"]; ?>">Ubah</a>
                <a href="hapus_laptop.php?ID_LAPTOP=<?= $row["ID_LAPTOP"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data?');">Hapus</a>
            </td>
            <td><?= $row["ID_LAPTOP"];?></td>
            <td><img src="img/<?= $row["GAMBAR"];?>" alt="" width="50"></td>
            <td><?= $row["MERK"];?></td>
            <td><?= $row["PROCESSOR"];?></td>
            <td><?= $row["RAM"];?></td>
            <td><?= $row["HARD_DISK"];?></td>
            <td><?= $row["VGA"];?></td>
            <td><?= $row["UKURAN_LAYAR"];?></td>
            <td><?= $row["SOUND_CARD"];?></td>
            <td><?= $row["STOK"];?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>

</body>
</html>