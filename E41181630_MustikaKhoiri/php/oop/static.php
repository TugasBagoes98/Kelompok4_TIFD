<?php

class ContohStatic{
    public static $angka = 1;

    public static function halo(){
        return "Halo " . self::$angka++ . " kali.";
    }
}

//memanggil property atau method yang memiliki keyword static
echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::halo();
echo "<hr>";

$obj = new ContohStatic;
echo $obj->halo();
echo $obj->halo();
echo $obj->halo();

echo "<hr>";

$obj2 = new ContohStatic;
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();

?>