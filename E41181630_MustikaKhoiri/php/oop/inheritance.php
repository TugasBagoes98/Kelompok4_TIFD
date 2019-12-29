<?php

//penjualan Produk
class Produk{
    //visibility property dari objek = "nilai default property"
    public $judul = "judul",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0,
        $jmlHalaman = 0,
        $waktuMain = 0;
    
    //visibility function constructorMethod(property constructor)
    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain){
        //memanggil property objek = dimasukkan ke property constructor
        $this->judul = $judul;
        $this->penulis = $penerbit;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk(){
        //Komik : Naruto | Masashi Kishimoto, Shonen Jump (RP. 30000) - 100 Halaman
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        
        return $str;
    }
}


//inheritance child dan parent class
class Komik extends Produk{
    public function getInfoProduk(){
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk{
    public function getInfoProduk(){
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} Jam.";
        return $str;
    }
}



class CetakInfoProduk{
    //visibility function namafunction (class namaobject) --> nama object diberi awalan class dapat membuat object menjadi type data sendiri
    public function cetak(Produk $produk){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0 , 50);

echo "<b>Hasil dari method getLabel di class Produk</b> <br>";
echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();

echo "<br> <hr>";
echo "<b>Hasil dari method di class CetakInfoProduk</b> <br>";
$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);

echo "<br> <hr>";
echo "<b>Hasil dari method getInfoProduk</b> <br>";
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

?>