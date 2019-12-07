<?php 
	include 'koneksi.php';

	// upload gambar
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	//menyimpan data kedalam variabel
	$nama_laptop	=$_POST['nama_laptop'];
	$processor		=$_POST['processor'];
	$ram			=$_POST['ram'];
	$harddisk		=$_POST['harddisk'];
	$vga			=$_POST['vga'];
	$ukuran_layar	=$_POST['ukuran_layar'];
	$soud_card		=$_POST['soud_card'];
	$stok			=$_POST['stok'];

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
	
	//query sql untuk insert data
	$cek = mysqli_query($koneksi, "SELECT * FROM laptop WHERE ID_LAPTOP='$id_laptop'") or die(mysqli_error($koneksi));

	if(mysqli_num_rows($cek) == 0){
		  $sql = mysqli_query($koneksi, "INSERT INTO laptop(ID_LAPTOP, GAMBAR_LAPTOP, NAMA_LAPTOP, PROCESSOR, RAM, HARDDISK, VGA, UKURAN_LAYAR, SOUD_CARD, STOK)  VALUES ('$id_laptop','$gambar','$nama_laptop','$processor','$ram','$harddisk','$vga','$ukuran_layar','$soud_card','$stok')") or die(mysqli_error($koneksi));
		  if ($sql) {
		  	echo '<script>alert("Berhasil menambah data."); document.location="tambah.php";</script>';
		  }else{
			echo '<div class="alert-warning">Gagal menambah data.</div>';
		}
	}else{
		echo '<div class="alert-warning">Gagal, ID sudah terdaftar.</div>';
	}

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

	//mengalihkan kembali ke halaman lainnya
	header("location:index.php")
?>