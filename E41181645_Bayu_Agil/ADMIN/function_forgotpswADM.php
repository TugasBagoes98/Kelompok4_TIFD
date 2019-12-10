<?php
    require 'connection.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    // Instantiation and passing `true` enables exceptions
    if (isset($_POST['email'])) {
        $emailTo = $_POST['email'];
    
        $token   = uniqid(true);
        $query   = mysqli_query($conn, "INSERT INTO reset (TOKEN_USER, EMAIL_USER) VALUES ('$token', '$emailTo')");
        
        if(!$query) {
            exit("Error"); 
        } 
    
        $mail = new PHPMailer(true);
    
        try { 
            //Server settings                                           // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP 
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'kurak4647@gmail.com';                 // SMTP username
            $mail->Password   = '@12Kurakura';                          // SMTP password
            $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to
    
            //Recipients
            $mail->setFrom('kurak4647@gmail.com', 'Mailer');
            $mail->addAddress($emailTo);                                // Add a recipient
            $mail->addReplyTo('no-reply@gmail.com', 'No reply');
    
            // Content
            $url                = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset_pswADM.php?token=$token";
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject      = 'Link reset password anda!';
            $mail->Body         = "<h1>Silahkan klik link dibawah ini untuk mereset password anda</h1>
                                    <br> 
                                    <a href='$url'>klik link ini</a>";
            $mail->AltBody      = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send();
            echo 'Link reset password telah dikirim ke email anda, silahkan buka email anda!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        exit();
    }
?>