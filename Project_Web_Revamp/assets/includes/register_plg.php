<?php

    require_once "connection.php";

    if(isset($_POST['registerUser']))
    {

        //Menyimpan data dari form kedalam variabel
        $namaUser = htmlspecialchars($_POST['namaUser']);
        $alamatUser = htmlspecialchars($_POST['alamatUser']);
        $notelpUser = htmlspecialchars($_POST['notelpUser']);
        $emailUser = htmlspecialchars(strtolower(stripcslashes($_POST['emailUser'])));
        $passwordUser = htmlspecialchars(strtolower(stripcslashes($_POST['passwordUser'])));
        $fileUser = $_FILES['fotoProfilUser'];

        //Query
        $sql_select = "select * from user where email_user = '".$emailUser."'";
        $select_query = mysqli_query($conn, $sql_select);


        //Enkripsi Password
        $passwordEncrypt = password_hash($passwordUser, PASSWORD_BCRYPT);

        //Handle Foto Profile
        $fileName = $fileUser['name'];
        $fileSize = $fileUser['size'];
        $fileError = $fileUser['error'];
        $tmpName = $fileUser['tmp_name'];

        //Mengecek apakah file sukses di upload
        if($fileError == 4)
        {
            header("Location: ../../register.php?error=filecorrupt");
        }

        //Mengecek apakah ukuran file melewati batas
        if($fileSize > 500000)
        {
            header("Location: ../../register.php?error=fileoverload");
        }

        //Mengambil ekstensi gambar
        $ekstensiGambar = explode('.',$fileName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        //Membuat nama baru
        $fileNameNew = uniqid();
        $fileNameNew .= '.'.$ekstensiGambar;

        //Mengecek apakah user sudah terdaftar
        if(mysqli_num_rows($select_query) > 0)
        {
            header("Location: ../../register.php?error=usernameexist");
        }else
        {
            //Menginsert kedalam database
            $sql_insert = "insert into user values('','".$namaUser."','".$alamatUser."','".$notelpUser."',
            '".$emailUser."','".$passwordEncrypt."','".$fileNameNew."','',0,'".date("Y-m-d")."')";
            
            if(mysqli_query($conn, $sql_insert))
            {
                //Mengupload Gambar
                move_uploaded_file($tmpName, '../images/user_images/'.$fileNameNew);
            }else
            {
                header("Location: ../../register.php?error=systemerro");
            }

        }

    }else
    {
        header("Location: ../../index.php?error=accessdenied");
    }

?>