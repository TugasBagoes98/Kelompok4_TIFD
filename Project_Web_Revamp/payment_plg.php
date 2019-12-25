<?php

    require_once "assets/includes/header_dashboard_plg.php";

    //Format Rupiah
    function rupiah($value)
    {
        $hasil = "Rp. ".number_format($value,2,',','.');
        return $hasil;
    }

    if(isset($_GET['payment']) && isset($_GET['idtransaksi']))
    {
        //Menyimpan data kedalam variabel
        $id_transaksi = $_GET['idtransaksi'];

        //Mencari apakah transaksi benar atau tidak
        //Membuat query
        $query = "select * from transaksi where ID_TRANSAKSI = ".$id_transaksi;

        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0)
        {
            ?>
            
            <div class="container">
                <h1 class="my-4"> Pembayaran </h1>
                <hr style="border: 2px solid black;">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="my-4 text-justify">
                            Anda dapat melakukan pembayaran dengan melakukan transfer sebesar
                            <strong><?php echo rupiah($_SESSION['amount']);?></strong> ke salah satu nomor rekening
                            berikut : 
                        </h4>
                        <ul>
                            <li>
                                <h4> Bank BCA : 751-8389-4564 </h4>
                            </li>
                            <li>
                                <h4> Bank BRI : 788-8939-8765 </h4>
                            </li>
                            <li>
                                <h4> Bank Mandiri : 089-6554-03839 </h4>
                            </li>
                        </ul>
                        <h4 class="my-4 text-justify">
                            Setelah anda melakukan transfer, harap upload bukti transaksi kedalam
                            form berikut ini.
                        </h4>
                        
                    </div>
                </div>
            </div>
            
            <?php
        }else
        {
            header("Location: checkout_plg.php?paymenterror=notfound");
        }

    }else
    {
        header("Location: checkout_plg.php?paymenterror=notfound");
    }


?>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_checkout.js"></script>
<?php require_once "assets/includes/footer_close.php"?>