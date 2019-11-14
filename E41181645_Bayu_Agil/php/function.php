<!-- Bismillah -->
<!-- Semoga ilmunya barokah -->

<?php
require 'connection.php';
// =======================================function pencarian data pelanggan=======================================
function cari($cari) {
    $query = "SELECT * FROM pelanggan WHERE NAMA_PELANGGAN LIKE '%$cari%' OR NIK LIKE '%$cari%' OR ALAMAT_PELANGGAN LIKE '%$cari%' OR NOHP_PELANGGAN LIKE '%$cari%' OR EMAIL_PELANGGAN LIKE '%$cari%'";
return Data_plg($query);
}

// =======================================function menampilkan data Pelanggan=======================================
function Data_plg($Data_plg) {
    global $conn;

    $result = mysqli_query($conn, $Data_plg);
    $rows   = [];
    while($row  = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows; 
}

// =======================================function regitrasi data Admin=======================================
function registrasi($data) {
    global $conn;

    $nama_adm   = htmlspecialchars($data["nama_adm"]);
    $alamat_adm = htmlspecialchars($data["alamat_adm"]);
    $nohp_adm   = htmlspecialchars($data["nohp_adm"]);
    $username   = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $password   = htmlspecialchars(mysqli_real_escape_string($conn, $data["password"]));
    $password2  = htmlspecialchars(mysqli_real_escape_string($conn, $data["password2"])); 
    $result     = mysqli_query($conn, "SELECT USERNAME_ADMIN FROM admin WHERE USERNAME_ADMIN = '$username'");
    
// ===Buat ID varchar auto increment===
    $cri_id     = mysqli_query($conn, "SELECT max(ID_ADMIN) AS id FROM admin");
    $cari       = mysqli_fetch_array($cri_id);
    $kode       = substr($cari['id'],3,6);
    $id_tbh     = $kode+1;
    
    if($id_tbh<10){
        $id="ADM00".$id_tbh;
    }
    elseif($id_tbh>=10 && $id_tbh<100){
        $id="ADM0".$id_tbh;
    }
    else{
        $id="ADM".$id_tbh;
    }

    // Cek apakah username yang ditambahkan sudah ada
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah ada, buat username lain');
            </script>";
        return false;
    }

    // Cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak cocok');
            </script>";
        return false;    
    }
$password = password_hash($password, PASSWORD_BCRYPT);

    // ===upload gambar===
    $foto_adm  = upload0();

        if(!$foto_adm) {
            return false;
        }
    // Insert ke database 
    mysqli_query($conn, "INSERT INTO admin VALUES('$id','$nama_adm','$alamat_adm','$nohp_adm','$foto_adm','$username','$password')");

    return mysqli_affected_rows($conn);
}

// ====function upload foto profil admin====
function upload0() {
    $namaFile   = $_FILES['foto_adm']['name'];
    $ukuranFile = $_FILES['foto_adm']['size'];
    $error      = $_FILES['foto_adm']['error'];
    $tmpName    = $_FILES['foto_adm']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah itu upload gambar atau bukan
    $ekstensiGambarValid  = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar       = explode('.', $namaFile);
    $ekstensiGambar       = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan Gambar');
            </script>";
        return false;
        }

    // cek jika ukuran gambar terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran Gambar terlalu besar, maksimal 1 Mb');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama baru
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

// =======================================function register pelanggan=======================================
function registrasiplg($data) {
    global $conn;

    $nik          = htmlspecialchars($data["nik"]);
    $nama_plg     = htmlspecialchars($data["nama_plg"]);
    $alamat_plg   = htmlspecialchars($data["alamat_plg"]);
    $nohp_plg     = htmlspecialchars($data["nohp_plg"]);
    $email_plg    = htmlspecialchars($data["email_plg"]); 
    $username_plg = htmlspecialchars(strtolower(stripslashes($data["username_plg"])));
    $password_plg = htmlspecialchars(mysqli_real_escape_string($conn, $data["password_plg"]));
    $password2_plg= htmlspecialchars(mysqli_real_escape_string($conn, $data["password2_plg"])); 
    $result       = mysqli_query($conn, "SELECT USERNAME_PELANGGAN FROM pelanggan WHERE USERNAME_PELANGGAN = '$username_plg'");
    $result1      = mysqli_query($conn, "SELECT NIK FROM pelanggan WHERE NIK = '$nik'");
    
    // ID autoincrement dari varchar
    $cri_id     = mysqli_query($conn, "SELECT max(ID_PELANGGAN) AS id FROM pelanggan");
    $cari       = mysqli_fetch_array($cri_id);
    $kode       = substr($cari['id'],3,6);
    $id_tbh     = $kode+1;
        
        if($id_tbh<10){
            $id="PLG00".$id_tbh;
        }
        elseif($id_tbh>=10 && $id_tbh<100){
            $id="PLG0".$id_tbh;
        }
        else{
            $id="PLG".$id_tbh;
        }

        // cek apakah nik yang dimasukkan sudah ada
        if(mysqli_fetch_assoc($result1)) {
            echo "<script>
                    alert('NIK ini sudah terdaftar');
                </script>";
            return false;
        }

        // cek username apakah sudah ada
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('username sudah ada, buat username lain');
                </script>";
            return false;
        }

        // cek konfirmasi password
        if($password_plg !== $password2_plg) {
            echo "<script>
                    alert('konfirmasi password tidak cocok');
                </script>";
            return false;    
        }
    $password_plg = password_hash($password_plg, PASSWORD_BCRYPT);
    
    // ===upload gambar===
    $ktp_plg  = upload();
    $foto_plg = upload1();
    
        if(!$ktp_plg) {
            return false;
        }

        if(!$foto_plg) {
            return false;
        }

    // insert ke database   
    mysqli_query($conn, "INSERT INTO pelanggan VALUES('$id','$nik','$nama_plg','$alamat_plg','$nohp_plg','$email_plg','$ktp_plg','$foto_plg','$username_plg','$password_plg')");

    return mysqli_affected_rows($conn);
}

// ====function upload foto ktp pelanggan====
function upload() {
    $namaFile   = $_FILES['ktp_plg']['name'];
    $ukuranFile = $_FILES['ktp_plg']['size'];
    $error      = $_FILES['ktp_plg']['error'];
    $tmpName    = $_FILES['ktp_plg']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah itu upload gambar atau bukan
    $ekstensiGambarValid  = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar       = explode('.', $namaFile);
    $ekstensiGambar       = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan Gambar');
            </script>";
        return false;
    }
    
    // cek jika ukuran gambar terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran Gambar terlalu besar, maksimal 1Mb');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama baru
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}


// ====function upload foto profil pelanggan====
function upload1() {
    $namaFile   = $_FILES['foto_plg']['name'];
    $ukuranFile = $_FILES['foto_plg']['size'];
    $error      = $_FILES['foto_plg']['error'];
    $tmpName    = $_FILES['foto_plg']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah itu upload gambar atau bukan
    $ekstensiGambarValid  = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar       = explode('.', $namaFile);
    $ekstensiGambar       = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan Gambar');
            </script>";
        return false;
        }

    // cek jika ukuran gambar terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran Gambar terlalu besar, maksimal 1 Mb');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama baru
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

//FUNCTION HAPUS DATA PELANGGAN
function hapus_plg($NIK){
    global $conn;
    mysqli_query($conn, "DELETE FROM pelanggan WHERE NIK = '$NIK'");
    return mysqli_affected_rows($conn);
}

?>