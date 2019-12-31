<?php

//interface namakelasinterface: tidak bisa diinstansiasi
interface Buah{
    //hanya deklarasi sebagai template, tidak boleh memiliki implementasi
    public function makan();
    public function setWarna($warna);
}

interface Benda{
    public function setUkuran($ukuran);
}

//dapat digunakan untuk mengimplementasikan lebih dari satu interface
//implementasi dari class interface ditulis dengan :
//class namakelasturunan implements namakelasinterface
class Apel implements Buah{
    //memiliki semua method yang terdapat pada class interface
    protected $warna;
    public function makan(){
        //kunyah
        //sampai habis
    }
    public function setWarna($warna){
        $this->warna = $warna;
    }
}

class Jeruk implements Buah, Benda{
    protected $warna;
    public function makan(){
        //kupas
        //kunyak
    }
    public function setWarna($warna){
        $this->warna = $warna;
    }
    public function setUkuran($ukuran){
        $this->ukuran = $ukuran;
    })
}

?>