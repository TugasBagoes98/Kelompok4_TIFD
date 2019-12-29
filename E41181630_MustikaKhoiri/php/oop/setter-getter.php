<?php

//penjualan Produk
class Produk{
    //visibility property dari objek = "nilai default property"
    private $judul,
        $penulis,
        $penerbit,
        $harga;
    protected $diskon = 0;
    
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

    public function getInfoProduk(){
        //Komik : Naruto | Masashi Kishimoto, Shonen Jump (RP. 30000) - 100 Halaman
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        
        return $str;
    }
}


//overriding dari inheritance child dan parent class dengan nama method yang sama yaitu getInfoProduk dengan menggunakan keyword parent
class Komik extends Produk{
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk(){
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk{
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk(){
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
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

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo "<b>Hasil dari method getLabel di class Produk</b> <br>";
echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();

echo "<br> <hr>";
echo "<b>Hasil dari method getInfoProduk</b> <br>";
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

echo "<br> <hr>";
echo "Harga Awal: " . $produk2->getHarga();
echo "<br>";
$produk2->setDiskon(50);
echo "Harga setelah diskon : " . $produk2->getHarga();

echo "<br> <hr>";
echo "<b>Hasil dari Method Getter di class Produk yaitu getJudul</b> <br>";
echo $produk1->getJudul();

echo "<br> <hr>";
echo "<b>Hasil dari Method Setter di class Produk yaitu setJudul</b> <br>";
$produk1->setJudul("Judul Baru");
echo $produk1->getJudul();
echo "<br>";
$produk1->setPenulis("Mustika Khoiri");
echo $produk1->getPenulis();

?>