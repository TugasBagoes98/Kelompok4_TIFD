<?php
// Load file koneksi.php
require 'connection.php';
$Data_plg = mysqli_query($conn, "SELECT * FROM user WHERE HAK_AKSES_USER != 2");

    function Data_plg($Data_plg) {
        global $conn;
    
        $result = mysqli_query($conn, $Data_plg);
        $rows   = [];
        while($row  = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows; 
    }
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];
// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['fotoProfil']['name'];
  $tmp = $_FILES['fotoProfil']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "img".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM user WHERE ID_USER='".$id."'";
    $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("img".$data['FOTO_PROFIL_USER'])) // Jika foto ada
      unlink("img".$data['FOTO_PROFIL_USER']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE user SET NAMA_USER='".$nama."', JENIS_KELAMIN='".$jk."', ALAMAT_USER='".$alamat."', NO_HP_USER='".$nohp."', EMAIL_USER='".$email."', USERNAME_USER='".$username."', PASSWORD_USER='".$password."', FOTO_PROFIL_USER='".$fotobaru."', TANGGAL_DAFTAR='".$tanggal."' WHERE ID_USER='".$id."'";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      echo "<script>alert('Data Berhasil Disimpan');document.location.href='data_admin.php'</script>\n"; // Redirect ke halaman admin.php
    }else{
      // Jika Gagal, Lakukan :
      echo "<script>alert('Data Gagal Disimpan karena gagal terhubung ke server');document.location.href='data_admin.php'</script>\n";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "<script>alert('Data Gagal Disimpan karena gagal upload foto');document.location.href='../admin.php?page=makanan'</script>\n";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE tabel_admin SET nama_admin='".$nama."', jenis_kelamin='".$jk."', alamat='".$alamat."', no_hp='".$nohp."', email='".$email."', username='".$username."', password='".$password."' WHERE id_makanan='".$id."'";
  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>alert('Data Berhasil Disimpan');document.location.href='data_admin.php'</script>\n"; // Redirect ke halaman admin.php
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>alert('Data Gagal Disimpan karena gagal terhubung ke server');document.location.href='data_admin.php'</script>\n";
  }
}
?>