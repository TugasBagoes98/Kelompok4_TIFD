<?php

//abstract class namakelasabstrak
abstract class Buah{
    private $warna;

    //abstract public function namamethodabstrak()
    ///method abstrak hanya ditulis nama methodnya (interfacenya) saja,
    //sedangkan implementasi (isinya) ada di kelas turunannya
    abstract public function makan();

    public function setWarna($warna){
        $this->warna = $warna;
    }
    
}

?>