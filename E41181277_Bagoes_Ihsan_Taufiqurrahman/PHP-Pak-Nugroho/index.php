<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Prediksi Jual Kecap </title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

    <!-- Bismillah -->
    <!-- 11/10/2019 13:00 -->
    <!-- Sinau Ojo Lali Dungane -->  
    
    <!-- Model Masalah -->
    <!-- 1. Diketahui data penjualan kecap abc dengan sebagai berikut -->
    <!--    Juli : 100 -->
    <!--    Agustus : 110 -->
    <!--    September : 120 -->
    <!--    Oktober : 130 -->
    <!--    November : ??? -->
    <!--    Desember : ??? -->
    <!--    Persamaan y = a + b(x) -->
    <!-- 2. Ditanyakan berapakah stok pada bulan November atau Desember -->
    <!-- 3. Jawab -->
    <!--    y = hasil akhir / stok setelah penambahan -->
    <!--    a = stok awal dari toko -->
    <!--    b = bulan / bulan ke-n dalam menambah stok -->
    <!--    x = jumlah penambahan stok -->
    <!--    y = a + b (x) -->
    <!--    y = 100 + 1 (10) -->
    <!--    y = 100 + 10 -->
    <!--    y = 110, maka y' = y + b(x) -->
    <!--    y' = y + b(x) -->
    <!--    y' = 110 + 1(10) -->
    <!--    y' = 110 + 10 = 120 -->
    <!--    maka rumus Y = a + b(x) dapat disederhakan atau dimodel ulang menjadi y = y + b(x) --> 

    <form action="jumlah.php" method="post">
        <label for=""> Input Penambahan Stok untuk bulan berikutnya : </label>
        <br>
        <input type="text" name="jmlh_stok" placeholder="Enter your number here">
        <br>
        <input type="submit" name="tambah" value="Tambahkan">
    </form>

    <h1> Data Penjualan Kecap ABC </h1>
    <table>
        <tr>
            <td> Bulan </td>
            <td> Stok </td>
        </tr>
        <tr>
            <td> Juli </td>
            <td> 100 </td>
        </tr>
        <tr>
            <td> Agustus </td>
            <td> 110 </td>
        </tr>
        <tr>
            <td> September </td>
            <td> 120 </td>
        </tr>
        <tr>
            <td> Oktober </td>
            <td> 130 </td>
        </tr>
    </table>

</body>
</html>