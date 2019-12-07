<!DOCTYPE html>
<html>
<head>
	<title>FORM LAPTOP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
	<body>
		<!-- Group judul -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="#">FORM TAMBAH LAPTOP</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>	
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Data Laptop</a>
					</li>
				</ul>
			</div>
		</div>
		</nav>
		
<?php
	include 'koneksi.php';
	if(isset($_GET['ID_LAPTOP'])){
		$id_laptop = $_GET['ID_LAPTOP'];

		$select = mysqli_query($koneksi, "SELECT * FROM laptop WHERE ID_LAPTOP='$id_laptop'") or die(mysqli_error($koneksi));

		if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning"> ID tidak ada dalam database.</div>';
				exit();
			}else{
				$data = mysqli_fetch_assoc($select);
			}
		}

?>

<?php

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

if(isset($_POST['submit'])){
	$gambarLama		=$_POST['gambarLama'];
	$nama_laptop	=$_POST['nama_laptop'];
	$processor		=$_POST['processor'];
	$ram			=$_POST['ram'];
	$harddisk		=$_POST['harddisk'];
	$vga			=$_POST['vga'];
	$ukuran_layar	=$_POST['ukuran_layar'];
	$soud_card		=$_POST['soud_card'];
	$stok			=$_POST['stok'];

	//cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else{
        $gambar = upload();
	}

	$sql = mysqli_query($koneksi, "UPDATE laptop SET NAMA_LAPTOP='$nama_laptop', GAMBAR_LAPTOP='$gambar', PROCESSOR='$processor', RAM='$ram', HARDDISK='$harddisk', VGA='$vga',UKURAN_LAYAR='$ukuran_layar',SOUD_CARD='$soud_card',STOK='$stok' WHERE ID_LAPTOP='$id_laptop'") or die(mysqli_error($koneksi));

	if($sql){
		echo '<script>alert("Berhasil menyimpan data."); document.location="index.php";</script>';
	}else{
		echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
	}
}
?>


<form action="update.php?ID_LAPTOP=<?php echo $id_laptop; ?>" method="post" enctype="multipart/form-data">
		<!-- Form group pertama -->
		<div class="form-group mx-sm-5 mb-3">
				<input type="hidden" class="form-control" name="id_laptop" readonly="" value="<?php echo $data['ID_LAPTOP'] ?>" required>
		</div>
		<div class="form-group mx-sm-5 mb-3">
			<input type="hidden" class="form-control" name="gambarLama" readonly="" value="<?php echo $data['GAMBAR_LAPTOP'] ?>" required>
		</div>
		<div class="form-group mx-sm-5 mb-3">
			<label for="exampleFormControlFile1">GAMBAR:</label>
				<input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1" img src="img/<?php echo $data['GAMBAR'] ?>" required>
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">NAMA LAPTOP:</label>
				<input type="text" class="form-control" name="nama_laptop" value="<?php echo $data['NAMA_LAPTOP'] ?>" required>
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">PROCESSOR:</label>
				<input type="text" class="form-control" name="processor" value="<?php echo $data['PROCESSOR'] ?>" required>
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">RAM:</label>
				<input type="text" class="form-control" name="ram" value="<?php echo $data['RAM'] ?>" required>
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">HARD DISK:</label>
				<input type="text" class="form-control" name="harddisk" value="<?php echo $data['HARDDISK'] ?>" required>
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">VGA:</label>
				<input type="text" class="form-control" name="vga" value="<?php echo $data['VGA'] ?>" required>
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">UKURAN LAYAR:</label>
				<input type="text" class="form-control" name="ukuran_layar" value="<?php echo $data['UKURAN_LAYAR'] ?>" required>
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">SOUND CARD:</label>
				<input type="text" class="form-control" name="soud_card" value="<?php echo $data['SOUD_CARD'] ?>" required>
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">STOK:</label>
				<input type="text" class="form-control" name="stok" value="<?php echo $data['STOK'] ?>" required>
		</div>
  	    <div class="form-group mx-sm-5 mb-3">
  	      <label class="col-sm-2 col-form-label">&nbsp;</label>
  	      <div class="col-sm-10">
      		<!-- <input type="submit"   name="submit" class="btn btn-primary" value="Simpan"> -->
      		<a href="index.php"><input type="submit"	name="submit" class="btn btn-primary" value="Simpan"></a>
      		<a href="index.php" class="btn btn-warning" value="Kembali">Kembali</a>
      		<!-- <input type="submit" class="btn btn-warning" value="Reset"> -->
  	      </div>
  	    </div>
	</form>
	</body>
</html>