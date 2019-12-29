<?php

class Mobil{
    //visibility property
    public $nama;
    public $merk;
    public $warna;
    public $kecepatanMaks;
    public $jumlahPenumpang;

    //visibility method namamethod
    public function tambahKecepatan(){

    }
    public function belokKanan(){
        
    }
    public function belokKiri(){
        
    }
}

//mobilsport merupakan child class dari parent class mobil
//class mobilsport bisa menggunakan property dan method yang terdapat dalam class mobil
class MobilSport extends Mobil {
    //property = turbo
    public $turbo = false;

    //method = jalankanTurbo
    public function jalankanTurbo(){
        $this->turbo = true;
        return "Turbo dijalankan!";
    }
}
?>