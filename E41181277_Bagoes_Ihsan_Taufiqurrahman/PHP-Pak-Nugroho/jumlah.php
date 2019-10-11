<?php
    
    //Mengecek apakah melalui tombol
    if(!isset($_POST['tambah']))
    {
        //Apabila tidak melalui tombol
        header("Location: index.php?error=kubamslur");
    }else
    {
        //Apabila melalui tombol
        //Menyambungkan dengan database
        include_once('connector.php');
        //Mengecek apakah inputan kosong
        if(empty($_POST['jmlh_stok']))
        {
            //Apabila kosong
            header("Location: index.php?error=kosong");
        }else
        {
            //Apabila tidak kosong
            //Menyimpan nilai input dalam variabel
            $qty = $_POST['jmlh_stok'];
            $bulan = $_POST['bulan'];
            //Mengecek apakah nilai input benar
            if($qty <= 0)
            {
                //Apabila nilai input kurang dari sama dengan 0
                header("Location: index.php?error=gaboleminus");
            }else
            {
                //Apabila nilai input lebih dari 0
                //Membuat syntax insert mysql
                $select_sql = "select * from tbl_kecap_abc order by id_transaksi desc limit 1";
                $insert_sql = "insert into tbl_kecap_abc (bulan, stok) values (?,?)";
                //Membuat prepared statement
                $select_stmt = mysqli_stmt_init($conn);
                $insert_stmt = mysqli_stmt_init($conn);

                //Mengecek apakah ada input paling baru dari database
                //Mengecek apakah statement berhasil dijalankan
                if(!mysqli_stmt_prepare($select_stmt, $select_sql))
                {
                    //Apabila statement gagal dijalankan
                    header("Location: index.php?error=statement");
                }else
                {
                    //Apabila statement berhasil dijalankan
                    //Mengecek apakah statement berhasil dieksekusi
                    if(!mysqli_stmt_execute($select_stmt))
                    {
                        //Apabila statement gagal dieksekusi
                        header("Location: index.php?error=statementfail");
                    }else
                    {
                        //Mengambil hasil dari database
                        $result = mysqli_stmt_get_result($select_stmt);
                        //Mengecek hasil dari database
                        $check_result = mysqli_num_rows($result);
                        if($check_result < 1)
                        {
                            //Mengecek apakah statement berhasil dijalankan
                            if(!mysqli_stmt_prepare($insert_stmt, $insert_sql))
                            {
                                //Apabila statement gagal dijalankan
                                header("Location: index.php?error=statement");
                            }else
                            {
                                //Apabila satement berhasil dijalankan
                                //Memberikan parameter kepada statement
                                mysqli_stmt_bind_param($insert_stmt, "si", $bulan, $qty);
                                //Mengecek apakah statement berhasil di eksekusi
                                if(!mysqli_stmt_execute($insert_stmt))
                                {
                                    header("Location: index.php?error=fail");
                                }else
                                {
                                    header("Location: index.php?succesinsert");
                                }
                            }
                        }else
                        {
                            //Mengecek apakah dapat mengambil data dari hasil query
                            if(!($row = mysqli_fetch_assoc($result)))
                            {
                                //Apabila gagal mengambil data dari hasil query
                                header("Location: index.php?error=failcatch");
                            }else
                            {
                                //Apabila berhasil mengambil data dari hasil query
                                $init_stock = $row['stok'];
                                $total_stok = tambah_stok($init_stock, $qty);
                                //Mengecek apakah statement berhasil dijalankan
                                if(!mysqli_stmt_prepare($insert_stmt, $insert_sql))
                                {
                                    //Apabila statement gagal dijalankan
                                    header("Location: index.php?error=statement");
                                }else
                                {
                                    //Apabila satement berhasil dijalankan
                                    //Memberikan parameter kepada statement
                                    mysqli_stmt_bind_param($insert_stmt, "si", $bulan, $total_stok);
                                    //Mengecek apakah statement berhasil di eksekusi
                                    if(!mysqli_stmt_execute($insert_stmt))
                                    {
                                        header("Location: index.php?error=fail");
                                    }else
                                    {
                                        header("Location: index.php?succesinsert");
                                    }
                                }
                                
                            }
                        }
                    }
                }

            }
        }
    }

    function tambah_stok($init_stok,$restok)
    {
        $total = $init_stok + $restok;
        return $total;
    }

?>