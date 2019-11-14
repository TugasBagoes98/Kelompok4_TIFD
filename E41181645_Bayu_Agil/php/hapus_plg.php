<?php

require 'function.php';
session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: login_adm.php");
        exit;
    }

$NIK = $_GET["NIK"];

//cek saat hapus ditekan
if(hapus_plg($NIK)>0){
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'data_plg.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'data_plg.php';
        </script>
    ";
}

?>