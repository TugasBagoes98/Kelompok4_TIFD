<?php
//KONEKSI
$koneksi = mysqli_connect("localhost", "root", "", "rizquina");

//FUNCTION MENAMPILKAN DATA LAPTOP
function query($dataLaptop){
    global $koneksi;
    $result = mysqli_query($koneksi, $dataLaptop);
    $rows   = [];
    while($row  = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//FUNCTION TAMBAH DATA LAPTOP
function tambah_laptop($data){
    global $koneksi;
    
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $merk           = htmlspecialchars($data["merk"]);
    $processor      = htmlspecialchars($data["processor"]);
    $ram            = htmlspecialchars($data["ram"]);
    $hard_disk      = htmlspecialchars($data["hard_disk"]);
    $vga            = htmlspecialchars($data["vga"]);
    $ukuran_layar   = htmlspecialchars($data["ukuran_layar"]);
    $sound_card     = htmlspecialchars($data["sound_card"]);
    $stok           = htmlspecialchars($data["stok"]);

    //ID LAPTOP VARCHAR AUTO INCREMENT
    $cri_id = mysqli_query($koneksi, "SELECT max(ID_LAPTOP) AS id FROM laptop");
    $cari = mysqli_fetch_array($cri_id);
    $kode = substr($cari['id'], 3, 6);
    $id_tbh = $kode+1;

    if($id_tbh<10){
        $id_laptop = "LPT00".$id_tbh;
    }
    elseif($id_tbh>=10 && $id_tbh<100){
        $id_laptop = "LPT0".$id_tbh;
    }
    else{
        $id_laptop = "LPT".$id_tbh;
    }

    $dataLaptop = "INSERT INTO laptop VALUES ('$id_laptop', '$gambar', '$merk', '$processor', '$ram', '$hard_disk', '$vga', '$ukuran_layar', '$sound_card', '$stok')";
    mysqli_query($koneksi, $dataLaptop);

    return mysqli_affected_rows($koneksi);

}

//FUNCTION UPLOAD FOTO LAPTOP
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('Pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    //cek apakah yang diupload gambar atau bukan
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
            alert('File yang dipilih salah!');
        </script>";
        return false;
    }

    //cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;

    //gambar siap diupload
    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

    return $namaFileBaru;
}

//FUNCTION UBAH DATA LAPTOP
function ubah_laptop($data){
    global $koneksi;
    $ID_LAPTOP = $data["id_laptop"];
    // ambil data dari tiap elemen dalam form
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $merk = htmlspecialchars($data["merk"]);
    $processor = htmlspecialchars($data["processor"]);
    $ram = htmlspecialchars($data["ram"]);
    $hard_disk = htmlspecialchars($data["hard_disk"]);
    $vga = htmlspecialchars($data["vga"]);
    $ukuran_layar = htmlspecialchars($data["ukuran_layar"]);
    $sound_card = htmlspecialchars($data["sound_card"]);
    $stok = htmlspecialchars($data["stok"]);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else{
        $gambar = upload();
    }

    // query insert perubahan data
    $dataLaptop = "UPDATE laptop SET 
                GAMBAR       = '$gambar',
                MERK         = '$merk',
                PROCESSOR    = '$processor',
                RAM          = '$ram',
                HARD_DISK    = '$hard_disk',
                VGA          = '$vga',
                UKURAN_LAYAR = '$ukuran_layar',
                SOUND_CARD   = '$sound_card',
                STOK         = '$stok'
            WHERE ID_LAPTOP  = '$ID_LAPTOP'";
    mysqli_query($koneksi, $dataLaptop);

    return mysqli_affected_rows($koneksi);
   
}

//FUNCTION HAPUS DATA LAPTOP
function hapus_laptop($ID_LAPTOP){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM laptop WHERE ID_LAPTOP = '$ID_LAPTOP'");

    return mysqli_affected_rows($koneksi);
}

//FUNCTION CARI DATA LAPTOP
function cari_laptop($keyword){
    $dataLaptop = "SELECT * FROM laptop 
            WHERE MERK LIKE '%$keyword%'OR
            PROCESSOR LIKE '%$keyword%'OR
            RAM LIKE '%$keyword%'OR
            HARD_DISK LIKE '%$keyword%'OR
            VGA LIKE '%$keyword%'OR
            SOUND_CARD LIKE '%$keyword%'";

    return query($dataLaptop);
}

?>