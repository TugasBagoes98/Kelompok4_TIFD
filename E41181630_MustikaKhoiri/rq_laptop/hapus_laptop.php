<?php

require 'function.php';

$ID_LAPTOP = $_GET["ID_LAPTOP"];

//cek saat hapus ditekan
if(hapus_laptop($ID_LAPTOP)>0){
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'laptop.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'laptop.php';
        </script>
    ";
}

?>