<?php

    session_start();
    
    require_once "connection.php";

    if(isset($_POST['saveUpdateProfile']))
    {
        //Menyimpan data kedalam variabel
        $namaUser = $_POST['namaUserProfile'];
        $alamatUser = $_POST['alamatUserProfile'];
        $notelpUser = $_POST['notelpUserProfile'];



    }else
    {
        header("Location: ../../index.php?accessdenied=true");
    }

?>