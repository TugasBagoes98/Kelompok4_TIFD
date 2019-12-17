<?php
    require_once "assets/includes/header_dashboard_plg.php";

    require_once "assets/includes/connection.php";

    //Format Rupiah
    function rupiah($value)
    {
        $hasil = "Rp. ".number_format($value,2,',','.');
        return $hasil;
    }
?>

    <div class="container">
        
    </div>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_history_transaksi.js"></script>
<?php require_once "assets/includes/footer_close.php"?>