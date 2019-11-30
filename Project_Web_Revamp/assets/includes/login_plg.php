<?php

    session_start();

    require_once "connection.php";

    if(isset($_POST['loginPelanggan']))
    {

        //Menyimpan data dalam variabel
        $emailPelanggan = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['emailLogin']));
        $passwordPelanggan = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['passwordLogin']));

        //Query
        $select_query = "select * from user where email_user = '".$emailPelanggan."'";
        $result = mysqli_query($conn, $select_query);

        //Proses Login
        if($result)
        {
            //Mengecek apakah ada data ditemukan
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);

                if(password_verify($passwordPelanggan, $row['PASSWORD_USER']))
                {
                    if($row['STATUS_AKTIVASI'] == 0)
                    {
                        header("Location: ../../index.php?activestatus=false");
                    }else
                    {
                        //Memberikan status login berhasil
                        $_SESSION['login'] = true;
                        print_r($row);
                        $_SESSION['ID_USER'] = $row['ID_USER'];
                        $_SESSION['NAMA_USER'] = $row['NAMA_USER'];
                        $_SESSION['EMAIL_USER'] = $row['EMAIL_USER'];
                        $_SESSION['HAK_AKSES_USER'] = $row['HAK_AKSES_USER'];

                        //Apabila ingat saya atau remember me dicentang
                        if(isset($_POST['checkRememberMe']))
                        {
                            //Menyimpan session login kedalam cookie
                            setcookie('logEmailPelanggan', $row['EMAIL_USER'], time() + 60);
                        }

                        header("Location: ../../index.php?login=success");
                    }

                }else
                {
                    header("Location: ../../index.php?wrongpassword=true");
                }

            }else
            {
                header("Location: ../../index.php?usernotfound=true");
            }   

        }else
        {
            header("Location: ../../index.php?error=system");
        }


    }else
    {
        header("Location: ../../index.php?error=access");
    }

?>