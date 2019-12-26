<?php
    session_start();
    require 'connection.php';
    if(isset($_POST['simpan']))
    {
        $id         = htmlspecialchars($_POST["laptop"]);
        $beli       = htmlspecialchars($_POST["beli"]);
        $jual       = htmlspecialchars($_POST["jual"]);
        $stok       = htmlspecialchars($_POST["stok"]);
        $garansi    = htmlspecialchars($_POST["garansi"]);
        $lama       = htmlspecialchars($_POST["lama"]);
        $tanggal    = date("Y-m-d H:i:s");
        $id_us      = $_SESSION["ID_USER"];

            $insert_sql = "INSERT INTO det_laptop VALUES('','".$id."','".$beli."','".$jual."','".$stok."','".$garansi."','".$lama."')";
            $var = mysqli_query($conn, $insert_sql);
            if($var == true)
            {
                header("Location: data_produk.php?result=success");
                $insert_sql2 = "INSERT INTO pengadaan_barang VALUES('','".$id_us."','".$tanggal."')";
                $var2 = mysqli_query($conn, $insert_sql2);
            }else
            {
                header("Location: pengadaan_brg.php?result=failed");
            }    
    } else 
    {
        header("Location: pengadaan_brg.php");
    } 
?>
