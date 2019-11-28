<?php

    require_once "connection.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

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
                $mail = new PHPMailer(true);

                try
                {

                    //Setting Server
                    $mail->isSMTP();                                            // Send using SMTP 
                    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'bayuagil04@gmail.com';                 // SMTP username
                    $mail->Password   = '@12Gantengg';                          // SMTP password
                    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 465;                                    // TCP port to connect to
            
                    //Recipients
                    $mail->setFrom('bayuagil04@gmail.com', 'Mailer');
                    $mail->addAddress($emailUser);                                // Add a recipient
                    $mail->addReplyTo('no-reply@gmail.com', 'No reply');
                    
                    //Membuat Isi dari Email
                    $url_reset_password = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/reset_pass.php?code=".$tokenUser;
                    $mail->isHTML(true);
                    $mail->Subject      = 'Link reset password anda!';
                    $mail->Body         = "<h1> Silahkan klik link dibawah ini untuk mereset password anda </h1>
                                           <br>
                                           <a href='".$url_reset_password."'> Klik Disini </a>";
                    $mail->AltBody      = "Non-HTML Mail Client";

                    //Mengirim Email
                    $mail->send();

                    //Redirect after reset password
                    header("Location: ../../after_reset.php?success=true");
                }catch(Exception $e)
                {
                    echo $mail->ErrorInfo;
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