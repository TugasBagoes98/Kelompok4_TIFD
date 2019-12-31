<?php

//INTERFACE CLASS
interface InfoProduk{
    public function getInfoProduk();
}


//penjualan Produk
//class utama untuk mendefinisikan komponen dasar sebuah produk yaitu produk pada kelas turunannya
abstract class Produk{
    //visibility property dari objek = "nilai default property"
    protected $judul,
        $penulis,
        $penerbit,
        $harga,
        $diskon = 0;
    
    //visibility function constructorMethod(property constructor)
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
        //memanggil property objek = dimasukkan ke property constructor
        $this->judul = $judul;
        $this->penulis = $penerbit;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // SETTER DAN GETTER

    //setter untuk judul
    public function setJudul($judul){
        //validasi bahwa judul harus string
        if(!is_string($judul)){
            throw new Exception("Judul harus String");
        }
        $this->judul = $judul;
    }

    //getter untuk judul
    public function getJudul(){
        return $this->judul;
    }


    //setter untuk penulis
    public function setPenulis($penulis){
        //validasi bahwa penulis harus string
        if(!is_string($penulis)){
            throw new Exception("Penulis harus String");
        }
        $this->penulis = $penulis;
    }

    //getter untuk penulis
    public function getPenulis(){
        return $this->penulis;
    }


    //setter untuk diskon
    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }

    //getter untuk diskon
    public function getDiskon(){
        return $this->diskon;
    }


    //setter untuk penerbit
    public function setPenerbit($penerbit){
        //validasi bahwa penerbit harus string
        if(!is_string($penerbit)){
            throw new Exception("Penerbit harus String");
        }
        $this->penerbit = $penerbit;
    }

    //getter untuk penerbit
    public function getPenerbit(){
        return $this->penerbit;
    }

    
    //setter untuk harga
    public function setHarga($harga){
        //validasi bahwa harga harus string
        if(!is_numeric($harga)){
            throw new Exception("harga harus Numeric");
        }
        $this->harga = $harga;
    }

    //getter untuk harga
    // function untuk memanggil harga yang memiliki properti dengan visibility private
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    // AKHIR SETTER DAN GETTER


    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }
    
    abstract public function getInfo();
}


//overriding dari inheritance child dan parent class dengan nama method yang sama yaitu getInfoProduk dengan menggunakan keyword parent
class Komik extends Produk implements InfoProduk{
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfo(){
        //Komik : Naruto | Masashi Kishimoto, Shonen Jump (RP. 30000) - 100 Halaman
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        
        return $str;
    }

    public function getInfoProduk(){
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk implements InfoProduk{
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfo(){
        //Komik : Naruto | Masashi Kishimoto, Shonen Jump (RP. 30000) - 100 Halaman
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        
        return $str;
    }

    public function getInfoProduk(){
        $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk{
    public $daftarProduk = [];

    public function tambahProduk(Produk $produk){
        $this->daftarProduk[] = $produk;
    }

    public function cetak(){
        $str = "DAFTAR PRODUK : <br>";
        
        foreach($this->daftarProduk as $p){
            $str .= "- {$p->getInfoProduk()} <br>";
        }
        return $str;
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();

?>