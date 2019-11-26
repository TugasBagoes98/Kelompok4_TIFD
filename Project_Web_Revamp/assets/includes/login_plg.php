<?php


    if(isset($_COOKIE['email_pelanggan']) && isset($_COOKIE['password_pelanggan']))
    {
        echo "Belum ada cookie";
    }else
    {
        echo "Oke";
    }

?>