<?php
    // date
    // echo date("l, d-M-Y");  

    // time
    // echo time();
    // echo date("l", time()-60*60*24*100);

    // mktime
    // membuat sendiri detik 
    // mktime(0,0,0,0,0,0)
    // jam,menit,detik,bulan,tanggal,tahun
    // echo date("l", mktime(0,0,0,7,6,1999));

    // strtotime
    // echo date("l", strtotime("6 jul 1999"));

    // <--? user defined function ?-->
    function salam($waktu, $nama){
        return "Selamat $waktu, $nama";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?= salam(); ?></h1>
</body>
</html>