<?php
require 'function.php';

// mengambil data di URL
$ID_LAPTOP = $_GET["ID_LAPTOP"];
// var_dump($ID_LAPTOP);
 
// query data laptop berdasarkan id
$laptop = query("SELECT * FROM laptop WHERE ID_LAPTOP = '$ID_LAPTOP'")[0];
// var_dump($laptop);


// cek saat tombol ubah ditekan
if (isset($_POST["submit"])) {
    
    if(ubah($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'laptop.php';
            </script>
        ";
    }else{
        echo ubah($_POST);
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'laptop.php';
            </script>
        ";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Laptop</title>
</head>
<body>
    <h1>Ubah Data Laptop</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_laptop" value="<?= $laptop["ID_LAPTOP"];?>">
        <input type="hidden" name="gambarLama" value="<?= $laptop["GAMBAR"];?>">
        <ul>
            <li>
                <label for="gambar">GAMBAR : </label> <br>
                <img src="img/ <?= $laptop['GAMBAR'];?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <label for="merk">MERK : </label>
                <input type="text" name="merk" id="merk" required
                value="<?= $laptop["MERK"];?>">
            </li>
            <li>
                <label for="processor">PROCESSOR : </label>
                <input type="text" name="processor" id="processor" required
                value="<?= $laptop["PROCESSOR"];?>">
            </li>
            <li>
                <label for="ram">RAM : </label>
                <input type="text" name="ram" id="ram" required
                value="<?= $laptop["RAM"];?>">
            </li>
            <li>
                <label for="hard_disk">HARD DISK : </label>
                <input type="text" name="hard_disk" id="hard_disk" required
                value="<?= $laptop["HARD_DISK"];?>">
            </li>
            <li>
                <label for="vga">VGA : </label>
                <input type="text" name="vga" id="vga" required
                value="<?= $laptop["VGA"];?>">
            </li>
            <li>
                <label for="ukuran_layar">UKURAN LAYAR : </label>
                <input type="text" name="ukuran_layar" id="ukuran_layar" required
                value="<?= $laptop["UKURAN_LAYAR"];?>">
            </li>
            <li>
                <label for="sound_card">SOUND CARD : </label>
                <input type="text" name="sound_card" id="sound_card" required
                value="<?= $laptop["SOUND_CARD"];?>">
            </li>
            <li>
                <label for="stok">STOK : </label>
                <input type="text" name="stok" id="stok" required
                value="<?= $laptop["STOK"];?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>