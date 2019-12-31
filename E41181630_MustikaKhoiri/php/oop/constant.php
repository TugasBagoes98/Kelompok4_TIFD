<?php

//cara penulisan :
//  1. define('namakonstanta', 'value');
define('NAMA', 'Mustika Khoiri');
echo NAMA;

echo "<br>";

//  2. const NAMAKONSTANTA = value;
const UMUR = 32;
echo UMUR;

echo "<br>";

//const di dalam class
class Coba{
    const NAMA = 'Tika';
}
//memanggil const yang terdapat di dalam class
echo Coba::NAMA;
echo "<br>";

//MAGIC CONSTANT
echo __LINE__; echo "<br>"; //1) __LINE__
echo __FILE__; echo "<br>"; //2) __FILE__
echo __DIR__; echo "<br>"; //3) __DIR__


function cobaFunction(){           //4) __FUNCTION__
    return __FUNCTION__;
}
echo cobaFunction(); echo "<br>";


class cobaClass{                    //5) __CLASS__
    public $kelas = __CLASS__;
}
$obj = new cobaClass;
echo $obj->kelas; echo "<br>";


echo __TRAIT__; echo "<br>";
echo __METHOD__; echo "<br>";
echo __NAMESPACE__;

?>