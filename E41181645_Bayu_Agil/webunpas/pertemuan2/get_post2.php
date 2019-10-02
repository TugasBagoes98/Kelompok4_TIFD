<?php
    $Smartphone = 
        [
            [
                "gambar" => "Koala.jpg",
                "merk" => "Samsung A10",
                "ram/rom" => "2GB/32GB",
                "android" => "Pie",
                "warna" => "hitam"
            ],

            [
                "gambar" => "Koala.jpg",
                "merk" => "Xiaomi redmi note 5",
                "ram/rom" => "3GB/32GB",
                "android" => "Pie",
                "warna" => "biru"
            ]
        ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>belajar GET</title>
</head>
<body>
<h1>Katalog Smartphone</h1> 
    <ul>
        <?php foreach ($Smartphone as $ph) : ?>
        <!-- <ul>
            <li> <img src="Gambar/<?= $ph["gambar"]; ?>" alt=""></li>
            <li>Merk    : <?= $ph["merk"]; ?></li>
            <li>RAM/ROM : <?= $ph["ram/rom"]; ?></li>
            <li>Android : <?= $ph["android"]; ?></li>
            <li>Warna   : <?= $ph["warna"]; ?></li>
        </ul> -->

        <!-- array $_GET -->
        <li>
            <a href="detil.php?
            gambar=<?= $ph["gambar"]; ?>
            &merk=<?= $ph["merk"]; ?>
            &ram/rom=<?= $ph["ram/rom"]; ?>
            &android=<?= $ph["android"]; ?>
            &warna=<?= $ph["warna"]; ?>">
            <?= $ph["merk"]; ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
