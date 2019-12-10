<?php
// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data tabel mahasiswa
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

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
    <h1>Daftar Mahasiswa</h1>

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
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="../img/<?= $row["gambar"];?>" alt="" width="50"></td>
            <td><?= $row["nim"];?></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["jurusan"];?></td>
        </tr>
        <?php $i++;?>
        <?php endwhile; ?>
    </table>
</body>
</html>