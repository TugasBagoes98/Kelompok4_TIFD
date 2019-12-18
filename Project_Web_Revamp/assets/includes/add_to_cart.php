<?php

    session_start();

    require_once "connection.php";

    if(isset($_SESSION['daftar_laptop']))
    {
        
    }else
    {
        $_SESSION['daftar_laptop'] = array();
    }

    if(isset($_SESSION['login']))
    {
        if(isset($_GET['laptop']))
        {
    
            //Menyimpan data kedalam variabel
            $id_laptop = $_GET['laptop'];
    
            //Mengambil data laptop berdasarkan id_laptop
            $query = "select * from laptop where ID_LAPTOP = ".$id_laptop;
    
            //Menjalankan query
            $query_run = mysqli_query($conn,$query);
    
            if($query_run)
            {
    
                if(mysqli_num_rows($query_run) > 0)
                {
                    array_push($_SESSION['daftar_laptop'],$id_laptop);
                    header("Location: ../../shop_cart.php");
                }else
                {
                    header("Location: ../../catalog.php?systemerror=true");
                }
    
            }else
            {
                header("Location: ../../catalog.php?systemerror=true");
            }
    
        }else
        {
            header("Location: ../../catalog.php?systemerror=true");
        }
    }else
    {
        header("Location: ../../index.php?login=false");
    }

?>