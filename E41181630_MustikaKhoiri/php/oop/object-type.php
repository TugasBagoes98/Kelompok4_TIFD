<?php

//penjualan Produk
class Produk{
    //visibility property dari objek = "nilai default property"
    public $judul = "judul",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = "0";
    
    //visibility function constructorMethod(property constructor)
    public function __construct($judul, $penulis, $penerbit, $harga){
        //memanggil property objek = dimasukkan ke property constructor
        $this->judul = $judul;
        $this->penulis = $penerbit;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }
}

class CetakInfoProduk{
    //visibility function namafunction (class namaobject) --> nama object diberi awalan class dapat membuat object menjadi type data sendiri
    public function cetak(Produk $produk){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", "30000");
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", "250000");

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";

$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);

?>