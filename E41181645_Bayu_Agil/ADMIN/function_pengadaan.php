<?php
    require 'connection.php';

    if(isset($_POST['simpan']))
    {
        $beli       = htmlspecialchars($_POST["beli"]);
        $jual       = htmlspecialchars($_POST["jual"]);
        $stok       = htmlspecialchars($_POST["lama"]);
        $garansi    = htmlspecialchars($_POST["garansi"]);
        $lama       = htmlspecialchars($_POST["lama"]);
        $id_user    = $_SESSION['ID_USER'];
        $tanggal    = date("Y-m-d H:i:s");


            $insert_sql = "INSERT INTO user VALUES('','".$nama."','".$jk."','".$alamat."','".$nohp."','".$email."', '".$password."','".$fotoProfil."','',1,'".$tanggal."','')";
            
            $var = mysqli_query($conn, $insert_sql);
            if($var == true)
            {
                header("Location: data_admin.php?message=success");
            }else
            {
                header("Location: tambah_admin.php?message=failed");
            }    
    } else 
    {
        header("Location: tambah_admin.php");
    } 
?>
