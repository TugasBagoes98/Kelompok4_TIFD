<?php
$mahasiswa = [
    ["Mustika Khoiri", "E41181630", "Teknologi Informasi", "mustikakhoiri15@gmail.com"],
    ["Mar'atul Khoiri", "E41181631", "Hubungan Internasional", "maratulkhoiri878@gmail.com"],
    ["Yajid Khoiri", "E41181632", "Administrasi Negara", "yajidkhoirii@gmail.com"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
        <li><?= $mhs[0]; ?></li>
        <li><?= $mhs[1]; ?></li>
        <li><?= $mhs[2]; ?></li>
        <li><?= $mhs[3]; ?></li>
    </ul>
<?php endforeach; ?>
</body>
</html>