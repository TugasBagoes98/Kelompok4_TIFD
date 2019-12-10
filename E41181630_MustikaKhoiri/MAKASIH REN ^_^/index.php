<!DOCTYPE html>
<html>
<head>
	<title>CRUD Data Laptop</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="#">DATA LAPTOP</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Form Daftar Laptop</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" style="margin-top:20px">
	<h2>List Laptop</h2>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead class="thead-dark">
		<tr>
			<th>NO.</th>
            <th>AKSI</th>
            <th>ID LAPTOP</th>
            <th>GAMBAR</th>
            <th>NAMA LAPTOP</th>
            <th>PROCESSOR</th>
            <th>RAM</th>
            <th>HARD DISK</th>
            <th>VGA</th>
            <th>UKURAN LAYAR</th>
            <th>SOUND CARD</th>
            <th>STOK</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			include 'koneksi.php';
			//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
			$sql = mysqli_query($koneksi, "SELECT * FROM laptop ORDER BY ID_LAPTOP ASC") or die(mysqli_error($koneksi));
			//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
			if(mysqli_num_rows($sql) > 0){
				//membuat variabel $no untuk menyimpan nomor urut
				$no = 1;
				//melakukan perulangan while dengan dari dari query $sql
				while ($data = mysqli_fetch_assoc($sql)){
					echo '<tr>
					  <td>'.$no.'</td>
					  <td>
					  		<a href="update.php?ID_LAPTOP='.$data['ID_LAPTOP'].'" class="badge badge-warning p-3">Edit</a>
							<a href="delete.php?ID_LAPTOP='.$data['ID_LAPTOP'].'" class="badge badge-danger p-3" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
					  </td>
					  <td>'.$data['ID_LAPTOP'].'</td>
					  <td><img src="img/'.$data['GAMBAR_LAPTOP'].'" width="50"></td>
					  <td>'.$data['NAMA_LAPTOP'].'</td>
					  <td>'.$data['PROCESSOR'].'</td>
					  <td>'.$data['RAM'].'</td>
					  <td>'.$data['HARDDISK'].'</td>
					  <td>'.$data['VGA'].'</td>
					  <td>'.$data['UKURAN_LAYAR'].'</td>
					  <td>'.$data['SOUD_CARD'].'</td>
					  <td>'.$data['STOK'].'</td>
					  </tr>';

					  $no++;
			        }
			    }else{
			    	echo '
			    	<tr>
			    		<td colspan="6">Tidak ada data.</td>
			    	</tr>
			    	';
			    }

		?>
	</tbody>
	</table>
	<!-- <?php
	$var = mysqli_num_rows($sql);
	echo "<b> Total : ".$var;
	?> -->
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
</body>
</html>