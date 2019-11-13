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
</head>
<body>
    <h1>Form Tambah Laptop</h1>

    <td><a href="tambah_laptop.php">Tambah</a></td>
    <br> <br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari_laptop">Cari</button>
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

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Laptop</th>
            <th>Gambar</th>
            <th>Merk</th>
            <th>Processor</th>
            <th>RAM</th>
            <th>Hard Disk</th>
            <th>VGA</th>
            <th>Ukuran Layar</th>
            <th>Sound Card</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($laptop as $row): ?>
        <tr>
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
            <td>
                <a href="ubah_laptop.php?ID_LAPTOP=<?= $row["ID_LAPTOP"]; ?>">Ubah</a>
                <a href="hapus_laptop.php?ID_LAPTOP=<?= $row["ID_LAPTOP"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>