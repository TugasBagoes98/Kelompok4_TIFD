<!-- BUILT IN FUNCTION
tidak perlu mendefinisikan function karena sudah ada pada php
-->
<?php

    // DATE (menampilkan tanggal)
    echo date("l, d M Y");
    echo "<br>";

    // TIME
    // UNIX Timestamp / EPOCH time
    // detik yang sudah berlalu sejak 1 Januari 1970 sampai saat ini
    // 1 Januari 1970 adalah patokan waktu yang disepakati untuk komputer
    echo time();
    echo "<br>";

    // menampilkan 100 hari selanjutnya
    echo date("l, d M Y", time()+60*60*24*100);
    echo "<br>";

    // menampilkan 100 hari sebelumnnya
    echo date("l, d M Y", time()-60*60*24*100);
    echo "<br>";

    // MKTIME (membuat sendiri detik)
    // mktime(0,0,0,0,0,0)
    // jam, menit, detik, bulan, tanggal, tahun
    echo date("l, d M Y", mktime(0,0,0,7,14,2001));
    echo "<br>";

    // STRTOTIME
    echo strtotime("14 July 2001");
?>