<!-- <?php
    $data_diri = [  ["Agil","Kediri","20 Tahun","Mancing"],
                    ["Arif"," Banyuwangi","20 Tahun","Main Layangan"],
                    ["Lita","Jember","20 Tahun","Mager"],
                    ["Irman","Kediri","20 Tahun","Mandi"]];
?> -->

<!-- Array associative -->
<!-- sebuah variable yang punya banyak nilai -->
<!-- keynya string dibuat sendiri -->
<?php
$data = [   
            [
            "nama" => "Agil", 
            "asal" => "Kediri",
            "umur" => "20",
            "hobi" => "Mancing",
            "warna_favorit" => ["coklat","abu-abu"],
            "gambar" => "Koala.jpg"
            ],

            [
            "nama" => "Arif", 
            "asal" => "Banyuwangi",
            "umur" => "20",
            "hobi" => "Main Layangan"
            // "warna_favorit" => ["kuning","biru","orange"]
            ],

            [
            "nama" => "Lita", 
            "asal" => "Jember",
            "umur" => "20",
            "hobi" => "Mager"
            // "warna_favorit" => ["hijau","biru","hitam"]
            ],

            [
            "nama" => "Irman", 
            "asal" => "Kediri",
            "umur" => "20",
            "hobi" => "Mandi",
            "warna_favorit" => ["biru","merah","kuning"]
            ] 
        ];
            
            // echo $data[0]["warna_favorit"][0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA</title>
</head>
<body>
    <h1>Data Diri</h1>

    
        <!-- menerapkan array multidimensi -->
        <?php foreach ($data as $dt) : ?>
        <ul>
            <li>
                <img src="Gambar/<?= $dt["gambar"]?>" alt="">
            </li>
            <li>
                Nama :<?= $dt["nama"];?>
            </li>
            <li>
                Asal :<?= $dt["asal"];?>
            </li>
            <li>
                Umur :<?= $dt["umur"];?>
            </li>
            <li>
                Hobi :<?= $dt["hobi"];?>
            </li>
            <!-- <li>
                <?php foreach ($data as $dt) : ?>
                    Warna Favorit :<?= $dt["warna_favorit"];?>
                <?php endforeach; ?>
            </li> -->
        </ul>
        <?php endforeach; ?> 
    
    
        <!-- <ul>
            <?php foreach ($data_diri as $i) : ?>
            <li>    
                <div class=""><?= $i;?></div>   
            </li>
            <?php endforeach?>
        </ul> -->
</body>
</html>