<?php
require 'function.php';

//cek saat tombol tambah ditekan
if(isset($_POST["submit"])){
    if(tambah_laptop($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href = 'laptop.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan!');
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
    <title>Tambah Data Laptop</title>
</head>
<body>
    <h1>Tambah Data Laptop</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="gambar">GAMBAR : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <label for="merk">MERK : </label>
                <input type="text" name="merk" id="merk" required>
            </li>
            <li>
                <label for="processor">PROCESSOR : </label>
                <input type="text" name="processor" id="processor" required>
            </li>
            <li>
                <label for="ram">RAM : </label>
                <input type="text" name="ram" id="ram"required>
            </li>
            <li>
                <label for="hard_disk">HARD DISK : </label>
                <input type="text" name="hard_disk" id="hard_disk" required>
            </li>
            <li>
                <label for="vga">VGA : </label>
                <input type="text" name="vga" id="vga" required>
            </li>
            <li>
                <label for="ukuran_layar">UKURAN LAYAR : </label>
                <input type="text" name="ukuran_layar" id="ukuran_layar" required>
            </li>
            <li>
                <label for="sound_card">SOUND CARD : </label>
                <input type="text" name="sound_card" id="sound_card" required>
            </li>
            <li>
                <label for="stok">STOK : </label>
                <input type="text" name="stok" id="stok" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>