<!-- Bismillah -->
<!-- Semoga ilmunya barokah -->

<?php
require 'connection.php';
// =====================================================Login Pelanggan====================================================    
function login_adm() {    
    // cek cookie
    if(isset($_COOKIE['op0']) && isset($_COOKIE['op1'])) {
        $op0 = $_COOKIE['op0'];
        $op1 = $_COOKIE['op1'];

        // ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT USERNAME_ADMIN FROM admin WHERE ID_ADMIN = $op0");
        $row    = mysqli_fetch_assoc($result);
    
        // cek cookie dan username
        if( $op1 === hash('sha256', $row['USERNAME_ADMIN'])) {
            $_SESSION['login'] = true;
        }
    }
    
    // cek login
    if(isset($_POST["login"])){
        global $conn;

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM admin WHERE USERNAME_ADMIN = '$username'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["PASSWORD_ADMIN"])) {
                
                // set session
                $_SESSION["login"] = true;
                // set ingat saya
                if(isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('op0', $row['ID_ADMIN'], time() + 60);
                    setcookie('op1', hash('sha256', $row["USERNAME_ADMIN"]), time() + 60);
                }

                header("Location: data_plg.php");
                exit;

            } else {
                echo "<script>
                        alert('Username atau Password salah/belum terdaftar')    
                    </script>";
            }
        }       
    }
}
// =================================================function login Admin end=================================================

// =================================================function Login Pelanggan====================================================
function login_plg(){    
    // cek cookie
    if(isset($_COOKIE['op0']) && isset($_COOKIE['op1'])) {
        $op0 = $_COOKIE['op0'];
        $op1 = $_COOKIE['op1'];

        // ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT USERNAME_PELANGGAN OR EMAIL_PELANGGAN FROM pelanggan WHERE ID_PELANGGAN = $op0");
        $row    = mysqli_fetch_assoc($result);
    
        // cek cookie dan username
        if( $op1 === hash('sha256', $row['USERNAME_PELANGGAN']['EMAIL_PELANGGAN'])) {
            $_SESSION['login'] = true;
        }
    }


    // cek login
    if(isset($_POST["login"])){
        global $conn;

        $username_plg = $_POST["username_plg"];
        $password_plg = $_POST["password_plg"];

        $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE USERNAME_PELANGGAN = '$username_plg' OR EMAIL_PELANGGAN = '$username_plg'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password_plg, $row["PASSWORD_PELANGGAN"])) {
                
                // set session
                $_SESSION["login"] = true;
                // set ingat saya
                if(isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('op0', $row['ID_PELANGGAN'], time() + 60);
                    setcookie('op1', hash('sha256', $row["USERNAME_PELANGGAN"]["EMAIL_PELANGGAN"]), time() + 60);
                }

                header("Location: index.php");
                exit;

            } else {
                echo "<script>
                        alert('Username atau Password salah/belum terdaftar')    
                    </script>";
            }
        }       
    }
}
// =================================================function login pelanggan end=================================================

// ===========================================Import PHPMailer classes into the global namespace===========================================
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
if (isset($_POST["email"])) {
    $emailTo = $_POST["email"];

    $code    = uniqid(true);
    $query   = mysqli_query($conn, "INSERT INTO reset (CODE, EMAIL_PELANGGAN) VALUES ('$code', '$emailTo')");

    if(!$query) {
        exit("Error"); 
    }

    $mail = new PHPMailer(true);

    try { 
        //Server settings                                           // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP 
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'bayuagil04@gmail.com';                 // SMTP username
        $mail->Password   = '@12Ganteng';                           // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('bayuagil04@gmail.com', 'Mailer');
        $mail->addAddress($emailTo);                                // Add a recipient
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');

        // Content
        $url                = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset_pswd.php?code=$code";
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
// =================================================PHP MAiler end=================================================

// =======================================function pencarian data pelanggan========================================
function cari($cari) {
    $query = "SELECT * FROM pelanggan WHERE NAMA_PELANGGAN LIKE '%$cari%' OR NIK LIKE '%$cari%' OR ALAMAT_PELANGGAN LIKE '%$cari%' OR NOHP_PELANGGAN LIKE '%$cari%' OR EMAIL_PELANGGAN LIKE '%$cari%'";
return Data_plg($query);
}
// =========================================function pencarian data end=================================================

// =======================================function menampilkan data Pelanggan=======================================
function Data_plg($Data_plg) {
    global $conn;

    $result = mysqli_query($conn, $Data_plg);
    $rows   = [];
    while($row  = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows; 
}
// ==================================function menampilakan data pelanggan end============================================

// =======================================function regitrasi data Admin=======================================
function registrasi($data) {
    global $conn;

    $nama_adm   = htmlspecialchars($data["nama_adm"]);
    $alamat_adm = htmlspecialchars($data["alamat_adm"]);
    $nohp_adm   = htmlspecialchars($data["nohp_adm"]);
    $username   = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $password   = htmlspecialchars(mysqli_real_escape_string($conn, $data["password"]));
    $password2  = htmlspecialchars(mysqli_real_escape_string($conn, $data["password2"])); 
    $result     = mysqli_query($conn, "SELECT USERNAME_ADMIN FROM admin WHERE USERNAME_ADMIN = '$username'");
    
// Buat ID varchar auto increment
    $cri_id     = mysqli_query($conn, "SELECT max(ID_ADMIN) AS id FROM admin");
    $cari       = mysqli_fetch_array($cri_id);
    $kode       = substr($cari['id'],3,6);
    $id_tbh     = $kode+1;
    
    if($id_tbh<10){
        $id="ADM00".$id_tbh;
    }
    elseif($id_tbh>=10 && $id_tbh<100){
        $id="ADM0".$id_tbh;
    }
    else{
        $id="ADM".$id_tbh;
    }

    // Cek apakah username yang ditambahkan sudah ada
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah ada, buat username lain');
            </script>";
        return false;
    }

    // Cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak cocok');
            </script>";
        return false;    
    }
    
    $password = password_hash($password, PASSWORD_BCRYPT);

    // upload gambar
    $foto_adm  = upload0();

        if(!$foto_adm) {
            return false;
        }
    // Insert ke database 
    mysqli_query($conn, "INSERT INTO admin VALUES('$id', '$nama_adm','$alamat_adm','$nohp_adm', '$foto_adm','$username','$password')");

    return mysqli_affected_rows($conn);
}

// function upload foto profil admin
function upload0() {
    $namaFile   = $_FILES['foto_adm']['name'];
    $ukuranFile = $_FILES['foto_adm']['size'];
    $error      = $_FILES['foto_adm']['error'];
    $tmpName    = $_FILES['foto_adm']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah itu upload gambar atau bukan
    $ekstensiGambarValid  = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar       = explode('.', $namaFile);
    $ekstensiGambar       = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan Gambar');
            </script>";
        return false;
        }

    // cek jika ukuran gambar terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran Gambar terlalu besar, maksimal 1 Mb');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama baru
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}
// ======================================function register Admin end=================================================

// =======================================function register pelanggan=======================================
function registrasiplg($data) {
    global $conn;
    // $nik          = htmlspecialchars($data["nik"]);
    $nama_plg     = htmlspecialchars($data["nama_plg"]);
    $alamat_plg   = htmlspecialchars($data["alamat_plg"]);
    $nohp_plg     = htmlspecialchars($data["nohp_plg"]);
    $email_plg    = htmlspecialchars(strtolower(stripslashes($data["email_plg"]))); 
    $username_plg = htmlspecialchars(strtolower(stripslashes($data["username_plg"])));
    $password_plg = htmlspecialchars(mysqli_real_escape_string($conn, $data["password_plg"]));
    $password2_plg= htmlspecialchars(mysqli_real_escape_string($conn, $data["password2_plg"])); 
    $result       = mysqli_query($conn, "SELECT USERNAME_PELANGGAN FROM pelanggan WHERE USERNAME_PELANGGAN = '$username_plg'");
    
    // $result1      = mysqli_query($conn, "SELECT NIK FROM pelanggan WHERE NIK = '$nik'");       
    
    // ID autoincrement dari varchar
    $cri_id     = mysqli_query($conn, "SELECT max(ID_PELANGGAN) AS id FROM pelanggan");
    $cari       = mysqli_fetch_array($cri_id);
    $kode       = substr($cari['id'],3,6);
    $id_tbh     = $kode+1;
        
        if($id_tbh<10){
            $id="PLG00".$id_tbh;
        }
        elseif($id_tbh>=10 && $id_tbh<100){
            $id="PLG0".$id_tbh;
        }
        else{
            $id="PLG".$id_tbh;
        }

        // cek apakah nik yang dimasukkan sudah ada
        // if(mysqli_fetch_assoc($result1)) {
        //     echo "<script>
        //             alert('NIK ini sudah terdaftar');
        //         </script>";
        //     return false;
        // }

        // cek username apakah sudah ada
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('username sudah ada, buat username lain');
                </script>";
            return false;
        }

        // cek konfirmasi password
        if($password_plg !== $password2_plg) {
            echo "<script>
                    alert('konfirmasi password tidak cocok');
                </script>";
            return false;    
        }
    $password_plg = password_hash($password_plg, PASSWORD_BCRYPT);
    
    // ===upload gambar===
    // $ktp_plg  = upload();
    $foto_plg = upload1();
    
        // if(!$ktp_plg) {
        //     return false;
        // }

        if(!$foto_plg) {
            return false;
        }

    // insert ke database   
    mysqli_query($conn, "INSERT INTO pelanggan VALUES('$id','','$nama_plg','$alamat_plg','$nohp_plg','$email_plg','','$foto_plg','$username_plg','$password_plg')");          
    return mysqli_affected_rows($conn);
}

// ====function upload foto ktp pelanggan====
// function upload() {
//     $namaFile   = $_FILES['ktp_plg']['name'];
//     $ukuranFile = $_FILES['ktp_plg']['size'];
//     $error      = $_FILES['ktp_plg']['error'];
//     $tmpName    = $_FILES['ktp_plg']['tmp_name'];

//     // cek apakah tidak ada gambar yang di upload
//     if($error === 4){
//         echo "<script>
//                 alert('pilih gambar terlebih dahulu');
//             </script>";
//         return false;
//     }

//     // cek apakah itu upload gambar atau bukan
//     $ekstensiGambarValid  = ['jpg', 'jpeg', 'png'];
//     $ekstensiGambar       = explode('.', $namaFile);
//     $ekstensiGambar       = strtolower(end($ekstensiGambar));
//     if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//         echo "<script>
//                 alert('Yang anda upload bukan Gambar');
//             </script>";
//         return false;
//     }
    
//     // cek jika ukuran gambar terlalu besar
//     if($ukuranFile > 1000000) {
//         echo "<script>
//                 alert('Ukuran Gambar terlalu besar, maksimal 1Mb');
//             </script>";
//         return false;
//     }

//     // lolos pengecekan, gambar siap upload
//     // generate nama baru
//     $namaFileBaru  = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;
//     move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
//     return $namaFileBaru;
// }


// ====function upload foto profil pelanggan====
function upload1() {
    $namaFile   = $_FILES['foto_plg']['name'];
    $ukuranFile = $_FILES['foto_plg']['size'];
    $error      = $_FILES['foto_plg']['error'];
    $tmpName    = $_FILES['foto_plg']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah itu upload gambar atau bukan
    $ekstensiGambarValid  = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar       = explode('.', $namaFile);
    $ekstensiGambar       = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan Gambar');
            </script>";
        return false;
        }

    // cek jika ukuran gambar terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran Gambar terlalu besar, maksimal 1 Mb');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama baru
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}
// ===============================================function register pelanggan end=================================================
?>