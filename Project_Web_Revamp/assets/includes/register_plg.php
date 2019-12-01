<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "../PHPMailer/src/Exception.php";
    require_once "../PHPMailer/src/PHPMailer.php";
    require_once "../PHPMailer/src/SMTP.php";

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
        $tokenUser = uniqid();
        $url_aktivasi_akun = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/aktivasi_acc.php?token=".$tokenUser;

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
        switch($fileError)
        {
            case 1 :
                header("Location: ../../register.php?error=fileexceed");
            break;

            case 2 :
                header("Location: ../../register.php?error=filemaxexceed");
            break;

            case 3 :
                header("Location: ../../register.php?error=partialupload");
            break;

            case 4 :
                header("Location: ../../register.php?error=nofile");
            break;

            case 6 :
                header("Location: ../../register.php?error=notempdir");
            break;

            case 7 :
                header("Location: ../../register.php?error=failedtowrite");
            break;

            default:
                header("Location: ../../register.php?unknown=true");
            break;
        };

        //Mengecek apakah ukuran file melewati batas
        if($fileSize > 512000)
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
            // //Menginsert kedalam database
            // $sql_insert = "insert into user values('','".$namaUser."','".$alamatUser."','".$notelpUser."',
            // '".$emailUser."','".$passwordEncrypt."','".$fileNameNew."','".$tokenUser."',0,'".date("Y-m-d")."',0)";
            
            // if(mysqli_query($conn, $sql_insert))
            // {

            //     $mail = new PHPMailer(true);

            //     try
            //     {

            //         //Konfigurasi Server
            //         $mail->isSMTP();
            //         $mail->Host = "smtp.gmail.com";
            //         $mail->SMTPAuth = true;
            //         $mail->Username = "tugasbagoes98@gmail.com";
            //         $mail->Password = "ihsan9877";
            //         $mail->SMTPSecure = "tls";
            //         $mail->Port = 587;

            //         //Penerima
            //         $mail->setFrom('tugasbagoes98@gmail.com','Admin');
            //         $mail->addAddress($emailUser, 'Pengguna');
            //         $mail->addReplyTo('noreply@rizquinastore.com','No-Reply');

            //         //Content
            //         $mail->isHTML(true);
            //         $mail->Subject = "Aktivasi Akun";
            //         $mail->Body = "<h1> Pelanggan yang terhormat. </h1>
            //                        <p> Anda telah mendaftar kedalam website kami. </p>
            //                        <p> Apabila anda merasa tidak melakukannya, harap abaikan email ini. </p>
            //                        <p> <a href='".$url_aktivasi_akun."'> Aktivasi Akun </a> </p>                    
            //                        ";
            //         $mail->AltBody = "Alternative";

            //         //Mengirim Email
            //         if($mail->send())
            //         {
            //             //Mengupload Gambar
            //             move_uploaded_file($tmpName, '../images/user_images/'.$fileNameNew);
            //             header("Location: ../../register.php?success=true");
            //         }else
            //         {
            //             header("Location: ../../register.php?error=failedtoregister");
            //         }

            //     }catch(Exception $e)
            //     {
            //         echo $mail->ErrorInfo;
            //     }
                
            // }else
            // {
            //     header("Location: ../../register.php?error=systemerror");
            // }

        }

    }else
    {
        header("Location: ../../index.php?error=accessdenied");
    }

?>