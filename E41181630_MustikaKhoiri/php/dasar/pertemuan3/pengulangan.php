<!-- CONTROL FLOW (STRUKTUR KENDALI)
mengatur alur pembacaan program oleh php

1. Pengulangan (for, while, do..while, for each)
    foreach : pengulangan khusus array
    sintaks:
    a)  looping for
        for(increment; decrement; terminasi){
            code;
        }
    b)  looping while
        increment;
        white(terminasi){
            code;
        }
        decrement;
    c)  looping do..while
        increment;
        do{
            code;
        decrement;
        }while(terminasi);
-->

<?php
    echo "This is For Looping <br>";
    for($i = 0; $i <5; $i++){
        echo "Hello World! <br>";
    }

    echo "<br>";
    echo "This is While Looping <br>";
    $i = 0;
    while($i < 5) {
        echo "Hello Tika!<br>"; //hasilnya "Hello Tika!" sebanyak 5 kali
    $i++;
    }
    echo "<br>";
    $i = 10;
    while($i < 5){
        echo "Hello Tika! <br>"; //hasilnya kosong (tidak muncul apapun) karena nilai $i=10 dan terminasi $i<5 itu salah
    $i++;
    }

    echo "<br>";
    echo "This is Do..While Looping <br>";
    $i = 0;
    do{
        echo "Hello World! <br>"; //hasilnya "Hello World!" sebanyak 5 kali, karena $i<5 itu benar, dan looping dimulai dari 0-4 yang berarti jumlahnya adalah 5
    $i++;
    }while($i < 5);
    echo "<br>";
    $i = 10;
    do{
        echo "Hello World! <br>"; //hasilnya "Hello World!" satu, karena nilai $i=10 dan terminasi $i<5 itu salah
    $i++;
    }while($i < 5);
    echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Make a Table</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <!-- <?php
            for($i=1; $i<=3; $i++){
                echo "<tr>";
                for($j=1; $j<=5; $j++){
                    echo "<td>$i,$j</td>";
                }
                echo "</tr>";
            }
        ?> -->
        <!-- atau bisa ditulis sebagai berikut -->
        <?php for($i=1; $i<=5; $i++) : ?>
            <?php if($i % 2 == 1) : ?>
                <tr class="warna1">
            <?php else : ?>
                <tr class="warna2">
            <?php endif; ?>
                <?php for($j=1; $j<=5; $j++) : ?>
                    <td><?php echo "$i, $j";?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>

