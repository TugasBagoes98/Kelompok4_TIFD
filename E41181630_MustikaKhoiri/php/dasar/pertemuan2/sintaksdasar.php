<!-- Pertemuan 2 - PHP Dasar
Sintaks PHP -->
<?php
// STANDAR OUTPUT:
// 1. echo, print --> untuk mencetak string, biasa digunakan untuk web
// 2. print_r --> untuk mencetak array, biasa digunakan untuk debugging
// 3. var_dump --> untuk melihat isi variabel (informasi tipe data, ukuran) biasa digunakan untuk debugging

echo "Mustika Khoiri ";
print_r("was born in Probolinggo, ");
var_dump("July 14th 2001.");

?>

<!-- PENULISAN SINTAKS PHP -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar PHP</title>
</head>
<body>
    <!-- 1. PHP di dalam HTML -->
    <h1>Halo, Selamat Datang <?php echo "Mus!"; ?> </h1>
    <!-- kenapa menggunakan php hanya untuk mencetak "Tika"?
    karena nantinya bisa digunakan untuk mencetak hal lain yang bisa diambil dari database -->

    <!-- 2. HTML di dalam PHP -->
    <?php
    echo "<h1>Halo, Selamat Datang Tika!</h1>"
    ?>
    <!-- penulisan yang kedua ini tidak disarankan -->
</body>
</html>

<!-- VARIABEL DAN TIPE DATA
1. Variabel ($)
tidak boleh menggunakan spasi atau pun - (minus)
tidak boleh diawali dengan angka, tapi boleh mengandung angka -->
<?php
$nama = "Khoiri";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar PHP</title>
</head>
<body>
    <h1>Halo, Selamat Datang <?php echo $nama, "!";?></h1>
</body>
</html>

<!-- OPERATOR
1. Aritmatika (+ - * / %)
ex:
$x = 10;
$y = 20;
exho $x * $y;

2. Operator penggabung string (concatenation/concat) = . (titik)
ex:
$nama_depan = "Mustika";
$nama_belakang = "Khoiri";
echo $nama_depan . " " . $nama_belakang;

3. Assignment (=, +=, -=, *=, /=, %=, .=)
ex:
    a)  $x = 1;
        $x += 5;    hasilnya 5+1 = 6
        $x -= 5;    hasilnya 5-1 = -4
        echo $x;

    b)  $nama ="Mustika";
        $nama .=" ";
        $nama .="Khoiri";
        echo $nama; hasilnya Mustika Koiri

4. Perbandingan (<, >, <=, >=, ==)
ex: 
var_dump(1 < 5);    hasilnya true
var_dump(1 > 5);    hasilnya false
var_dump(1 == "1"); hasilnya true, karena var_dump hanya mengecek nilainya, bukan tipe datanya.

5. Identitas (===, !==)
ex: 
var_dump(1 === "1");    hasilnya false, karena meskipun nilainya sama tetapi tipe datanya berbeda.
var_dump(1 !== "1");    hasilnya true

6. Logika (&&, ||, !)
ex:
    a) menggunakan operator &&
        - dua logika pembandingnya harus bernilai true agar hasilnya true
        - jika salah satu pembandingnya bernilai false, maka hasilnya false
        $x = 20;
        var_dump($x < 30 && $x % 2 == 0);   hasilnya true
        var_dump($x < 10 && $x % 2 == 0);   hasilnya false 
-->