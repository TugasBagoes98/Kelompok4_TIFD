<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'function.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari diklik
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

// ambil data (fetch) mahasiswa dari object result
// 1. mysqli_fetch_row() --> mengembalikan array numerik
// $mhs = mysqli_fetch_row($result);
// var_dump($mhs[2]);

// 2. mysqli_fetch_assoc() --> mengembalikan array assosiative
// $mhs = mysqli_fetch_assoc($result);
// var_dump($mhs["nama"]);

// 3. mysqli_fetch_array() --> mengembalikan array numerik dan assosiative
// $mhs = mysqli_fetch_array($result);
// var_dump($mhs["nama"]); atau
// var_dump($mhs[2]);

// 4. mysqli_fetch_object() --> mengembalikan array objek
// $mhs = mysqli_fetch_object($result);
// var_dump($mhs -> nama);

// mengambil semua data yang ada dari mahasiswa
// while ($mhs = mysqli_fetch_assoc($result)) {
// var_dump($mhs);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
</head>
<body>

    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br> <br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>
    <br>

    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row): ?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"];?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin Ingin Menghapus Data?');">hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"];?>" alt="" width="50"></td>
            <td><?= $row["nim"];?></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["jurusan"];?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach; ?>
    </table>
    </div>

<script src="js/script.js"></script>

</body>
</html>