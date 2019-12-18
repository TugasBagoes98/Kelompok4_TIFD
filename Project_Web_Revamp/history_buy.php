<?php
    require_once "assets/includes/header_dashboard_plg.php";

    require_once "assets/includes/connection.php";

    //Format Rupiah
    function rupiah($value)
    {
        $hasil = "Rp. ".number_format($value,2,',','.');
        return $hasil;
    }

    //Format Transaksi
    function penjualanFormat($value)
    {
        
        if(strlen($value) == 1)
        {
            return "PNJ00".$value;
        }else if(strlen($value) == 2)
        {
            return "PNJ0".$value;
        }else if(strlen($value) == 3)
        {
            return "PNJ".$value;
        }
    }

    //Format mengubah status
    function convertStatus($value)
    {
        if($value == 0)
        {
            return "Terbayar";
        }else if($value == 1)
        {
            return "Belum Terbayar";
        }
    }

    function convertStatusGaransi($value)
    {
        if($value == 0)
        {
            return "Tidak ada garansi";
        }else
        {
            return "Bergaransi";
        }
    }

    //Membuat query
    $query_sudah_dibayar = "select transaksi.ID_TRANSAKSI, transaksi.TANGGAL_TRANSAKSI, transaksi.STATUS_TRANSAKSI,
    user.ID_USER,user.NAMA_USER, detail_transaksi.ID_DETAIL_TRANSAKSI, detail_transaksi.JUMLAH_BELI, laptop.ID_LAPTOP, laptop.NAMA_LAPTOP,det_laptop.HARGA_JUAL, det_laptop.STATUS_GARANSI, det_laptop.LAMA_GARANSI
    from transaksi inner join detail_transaksi on transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI
    inner join user on transaksi.ID_USER = user.ID_USER inner join det_laptop on detail_transaksi.ID_DET_LAPTOP = det_laptop.ID_DET_LAPTOP inner join laptop on det_laptop.ID_LAPTOP = laptop.ID_LAPTOP
    where user.ID_USER = ".$_SESSION['ID_USER']." and transaksi.STATUS_TRANSAKSI = 1";

    
    $query_belum_dibayar = "select transaksi.ID_TRANSAKSI, transaksi.TANGGAL_TRANSAKSI, transaksi.STATUS_TRANSAKSI,
    user.ID_USER,user.NAMA_USER, detail_transaksi.ID_DETAIL_TRANSAKSI, detail_transaksi.JUMLAH_BELI, laptop.ID_LAPTOP, laptop.NAMA_LAPTOP,det_laptop.HARGA_JUAL, det_laptop.STATUS_GARANSI, det_laptop.LAMA_GARANSI
    from transaksi inner join detail_transaksi on transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI
    inner join user on transaksi.ID_USER = user.ID_USER inner join det_laptop on detail_transaksi.ID_DET_LAPTOP = det_laptop.ID_DET_LAPTOP inner join laptop on det_laptop.ID_LAPTOP = laptop.ID_LAPTOP
    where user.ID_USER = ".$_SESSION['ID_USER']." and transaksi.STATUS_TRANSAKSI = 0";

    //Menjalankan query
    $run_query_verified = mysqli_query($conn,$query_sudah_dibayar);
    $run_query_not_verified = mysqli_query($conn,$query_belum_dibayar);

    if($run_query_verified && $run_query_not_verified)
    {
        if((mysqli_num_rows($run_query_verified) > 0) || (mysqli_num_rows($run_query_not_verified) > 0))
        {
            ?>
                <div class="container">
                    <h1 class="my-4"> Histori Transaksi </h1>
                    <hr style="border: 1px solid black;">
                    <h3 class="my-4"> Transaksi sudah dibayar </h3>
                    <?php
                        if(mysqli_num_rows($run_query_verified) > 0)
                        {                
                            while($row = mysqli_fetch_assoc($run_query_verified))
                            {

                            }
                        }else
                        {
                            ?>
                                <h5 class="my-4 text-center px-2 py-4 bg-dark text-light w-25 mx-auto rounded"> Tidak ada transaksi </h5>
                            <?php
                        }
                    ?>
                    <hr style="border: 1px solid black;">
                    <h3 class="my-4"> Transaksi belum dibayar </h3>
                    <?php
                        if(mysqli_num_rows($run_query_not_verified) > 0)
                        {
                            ?>
                                <table class="table table-bordered table-striped table-hover">
                                   <thead>
                                        <tr>
                                            <th> Kode Transaksi </th>
                                            <th> Tanggal Transaksi </th>
                                            <th> Nama Laptop </th>
                                            <th> Harga Jual </th>
                                            <th> Jumlah Beli </th>
                                            <th> Status Garansi </th>
                                            <th> Garansi </th>
                                            <th> Status Pembayaran </th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                    <?php
                                        while($row = mysqli_fetch_assoc($run_query_not_verified))
                                        {
                                            ?>
                                                <tr>
                                                    <td> <?php echo penjualanFormat($row['ID_TRANSAKSI']);?> </td>
                                                    <td> <?php echo $row['TANGGAL_TRANSAKSI'];?> </td>
                                                    <td> <?php echo $row['NAMA_LAPTOP'];?> </td>
                                                    <td> <?php echo $row['HARGA_JUAL'];?> </td>
                                                    <td> <?php echo $row['JUMLAH_BELI'];?> </td>
                                                    <td> <?php echo convertStatusGaransi($row['STATUS_GARANSI']);?> </td>
                                                    <td> <?php echo $row['LAMA_GARANSI'];?> </td>
                                                    <td> <?php echo convertStatus($row['STATUS_TRANSAKSI']);?> </td>
                                                </tr>
                                            <?php      
                                        }
                                    ?>
                                   </tbody>
                                </table>
                            <?php
                        }else
                        {
                            ?>
                                <h5 class="my-4 text-center px-2 py-4 bg-dark text-light w-25 mx-auto rounded"> Tidak ada transaksi </h5>
                            <?php
                        }
                    ?>
                </div>                
            <?php

        }else
        {
            ?>
                <div class="container">
                    <h1 class="text-center my-4"> Tidak ada histori transaksi </h1>
                </div>
            <?php
        }
    }else
    {
        header("Location: dashboard_plg.php?systemerror=true");
    }

?>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_history_transaksi.js"></script>
<?php require_once "assets/includes/footer_close.php"?>