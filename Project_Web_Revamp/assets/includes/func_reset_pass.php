<?php

    require_once  "connection.php";

    if(isset($_POST['resetPass']))
    {
        //Menyimpan data kedalam variabel
        $token = $_POST['tokenUser'];
        $passwordUser = $_POST['resetPassword'];

        



    }else
    {
        header("Location: ../../index.php?access=error");
    }

?>