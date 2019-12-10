<?php

	include('koneksi.php');

	if(isset($_GET['ID_LAPTOP'])){
		$id_siswa = $_GET['ID_LAPTOP'];

		$cek = mysqli_query($koneksi, "SELECT * FROM laptop WHERE ID_LAPTOP='$id_siswa'") or die(mysqli_error($koneksi));

		if(mysqli_num_rows($cek) > 0){

			$del = mysqli_query($koneksi, "DELETE FROM laptop WHERE ID_LAPTOP='$id_siswa'") or die(mysqli_error($koneksi));
			if($del){
				echo '<script>alert("Berhasil menghapus data."); document,location="index.php";</script>';
			}else{
				echo '<script>alert("Gagal menghapus data."); document,location="index.php";</script>';
			}
		}else{
			echo '<script>alert("ID tidak ditemukan di database."); document,location="index.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document,location="index.php";</script>';
	}

?>