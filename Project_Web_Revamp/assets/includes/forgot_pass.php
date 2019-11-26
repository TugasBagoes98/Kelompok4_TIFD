<?php

    require_once "connection.php";

    use PHPMAILER\PHPMAILER\PHPMAILER;
    use PHPMAILER\PHPMAILER\Exception;

    require_once "../PHPMailer/src/Exception.php";
    require_once "../PHPMailer/src/PHPMailer.php";
    require_once "../PHPMailer/src/SMTP.php";


    if(isset($_POST['lupaPassword']))
    {
        //Menyimpan data kedalam variabel
        $emailUser = htmlspecialchars(stripcslashes($_POST['lupaPasswordUser']));
        //Membuat token untuk lupa password
        $tokenUser = uniqid();
        //Query
        $query_update = "update user set token_user = '".$tokenUser."' where email_user = '".$emailUser."'";
        $query_search = "select * from user where email_user = '".$emailUser."'";
        $result = mysqli_query($conn,$query_search);


        if(mysqli_num_rows($result) > 0)
        {

            if(mysqli_query($conn, $query_update))
            {
                //Membuat object mailer baru
                $mailer = new PHPMailer(true);

                try
                {

                    //Setting Server
                    $mailer->isSMTP();
                    $mailer->Host         = gethostbyname('smtp.gmail.com');
                    $mailer->SMTPAuth     = true;
                    $mailer->Username     = 'tugasbagoes98@gmail.com';
                    $mailer->Password     = 'ihsan9877';
                    $mailer->SMTPSecure   = 'tls';
                    $mailer->Port         =  587;


                    //Recipients atau Penerima
                    $mailer->setFrom('rizquinalaptop@store.com','Mailer');
                    $mailer->addAddress($emailUser);
                    $mailer->addReplyTo('no-reply@rizquinastore.com','No Reply');

                    //Membuat Isi dari Email
                    $url_reset_password = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/reset_pass.php?code=".$tokenUser;
                    $mailer->isHTML(true);
                    $mailer->Subject      = 'Link reset password anda!';
                    $mailer->Body         = "<h1> Silahkan klik link dibawah ini untuk mereset password anda </h1>
                                           <br>
                                           <a href='".$url_reset_password."'> Klik Disini </a>";
                    $mailer->AltBody      = "Non-HTML Mail Client";

                    //Mengirim Email
                    $mailer->send();

                    //Redirect after reset password
                    header("Location: ../../after_reset.php?success=true");
                }catch(Exception $e)
                {
                    echo $mailer->ErrorInfo;
                }

            }else
            {
                header("Location: ../../index.php?errorprocess=true");
            }

        }else
        {
            header("Location: ../../index.php?usernotfound=true");
        }


    }else
    {
        header("Location: ../../index.php?error=accessdenied");
    }

?>