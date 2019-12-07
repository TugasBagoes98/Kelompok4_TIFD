<?php
// ARRAY ASSOCIATIVE  (key atau index-nya adalah string yang kita buat sendiri)
$mahasiswa = [
    ["Nama" => "Mustika Khoiri", "NIM" => "E41181630", "Jurusan" => "Teknologi Informasi", "Email" => "mustikakhoiri15@gmail.com", "Gambar" => "tika.jpg"],
    ["Nama" => "Mar'atul Khoiri", "NIM" => "E41181631", "Jurusan" => "Hubungan Internasional", "Email" => "maratulkhoiri878@gmail.com"],
    ["Nama" => "Yajid Khoiri", "NIM" => "E41181632", "Jurusan" => "Administrasi Negara", "Email" => "yajidkhoirii@gmail.com"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs): ?>
        <ul>
            <li>
                <img src="../img/<?= $mhs["Gambar"]; ?>" alt="">
            </li>
            <li>Nama : <?= $mhs["Nama"]; ?></li>
            <li>NIM : <?= $mhs["NIM"]; ?></li>
            <li>Jurusan : <?= $mhs["Jurusan"]; ?></li>
            <li>Email : <?= $mhs["Email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>