<?php

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

?>