<?php

    if(isset($_POST['registerUser']))
    {

        $namaUser = $_POST['namaUser'];
        $alamatUser = $_POST['alamatUser'];
        $notelpUser = $_POST['notelpUser'];
        $emailUser = $_POST['emailUser'];
        $passwordUser = $_POST['passwordUser'];
        $fileUser = $_FILES['fotoProfilUser'];

        //Mengecek apakah kosong

        if(empty($namaUser) || empty($alamatUser) || empty($notelpUser) || empty($emailUser)
           || empty($passwordUser) || $fileUser['error'] > 0)
        {
            header("Location: ../../index.php?error=emptyfield");
        }else
        {
            //Apabila 
        }


    }else
    {
        header("Location: ../../index.php?error=accessdenied");
    }

?>