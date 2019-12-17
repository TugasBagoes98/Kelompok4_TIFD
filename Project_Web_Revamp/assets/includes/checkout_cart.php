<?php


    session_start();


    if(isset($_GET['click']))
    {
        if(isset($_SESSION['daftar_laptop']))
        {
            
        }else
        {
            header("Location: ../../shop_cart.php?emptylaptop=true");
        }
    }else
    {
        header("Location: ../../dashboard_plg.php?accessdenied=true");
    }


?>