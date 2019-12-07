<!DOCTYPE html>
<html>
<head>
	<title>FORM DIGITAL TALENT</title>
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
		<!-- Akhir judul -->

	<form action="simpan.php" method="post" enctype="multipart/form-data">
		<!-- Form group pertama -->
		<div class="form-group mx-sm-5 mb-3">
				<input type="hidden" class="form-control" name="id_laptop" hidden="" readonly required>
		</div>
		<div class="form-group mx-sm-5 mb-3">
			<label for="exampleFormControlFile1">GAMBAR:</label>
				<input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
		</div>
		<!-- Form group kedua -->
		<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">NAMA LAPTOP:</label>
				<input type="text" class="form-control" name="nama_laptop">
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">PROCESSOR:</label>
				<input type="text" class="form-control" name="processor">
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">RAM:</label>
				<input type="text" class="form-control" name="ram">
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">HARD DISK:</label>
				<input type="text" class="form-control" name="harddisk">
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">VGA:</label>
				<input type="text" class="form-control" name="vga">
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">UKURAN LAYAR:</label>
				<input type="text" class="form-control" name="ukuran_layar">
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">SOUND CARD:</label>
				<input type="text" class="form-control" name="soud_card">
		</div>
	  	<div class="form-group mx-sm-5 mb-3">
			<label for="exampleInputNama">STOK:</label>
				<input type="text" class="form-control" name="stok">
		</div>
		<!-- &nbsp = spasi -->
  	    <div class="form-group mx-sm-5 mb-3">
  	      <label class="col-sm-2 col-form-label">&nbsp;</label>
  	      <div class="col-sm-10">
      		<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
      		<input type="submit" class="btn btn-warning" value="Reset">
  	      </div>
  	    </div>
	</form>
	</body>
</html>