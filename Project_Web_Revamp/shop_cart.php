<?php
    require_once "assets/includes/header_dashboard_plg.php";

    require_once "assets/includes/connection.php";

?>

        <div class="container">
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <th> No. </th>
                                <th> Gambar Laptop </th>
                                <th> Nama Laptop </th>
                                <th> Processor </th>
                                <th> VGA </th>
                                <th> RAM </th>
                                <th> Harddisk </th>
                                <td colspan="3"> Jumlah </td>
                            </tr>
                        </thead>              
                        <tbody>
                            <?php
                            
                                if(isset($_SESSION['daftar_laptop']))
                                {
                                    for($i = 0; $i < count($_SESSION['daftar_laptop']); $i++)
                                    {
                                        //Membuat query untuk mengambil data laptop
                                        $query = "select * from laptop where id_laptop = ".$_SESSION['daftar_laptop'][$i];
                                
                                        //Menjalankan query
                                        $result = mysqli_query($conn,$query);
                                
                                        $row = mysqli_fetch_assoc($result);
                                        
                                        ?>
                                            <tr class="text-center">
                                                <td><?php echo $i;?></td>
                                                <td>
                                                    <img src="assets/includes/images/"<?php echo $row['GAMBAR_LAPTOP']; ?> alt="Gambar laptop">
                                                </td>
                                                <td><?php echo $row['NAMA_LAPTOP'];?></td>
                                                <td><?php echo $row['PROCESSOR'];?></td>
                                                <td><?php echo $row['VGA'];?></td>
                                                <td><?php echo $row['RAM'];?></td>
                                                <td><?php echo $row['HARDDISK'];?></td>
                                                <td colspan="3">
                                                    <button class="btn btn-outline-dark">
                                                        <span>&laquo;</span>
                                                    </button>
                                                    <span class="mx-2">1</span>
                                                    <button class="btn btn-outline-dark">
                                                        <span>&raquo;</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                
                                    }
                                    ?>
                                        <tr>
                                            <td colspan="7">
                                            </td>
                                            <td class="text-center">
                                                <button class="btn-outline-dark btn"> Checkout </button>
                                            </td>
                                        </tr>                                    
                                    <?php
                                }else
                                {
                                    echo "<td colspan='7' class='text-center'> Keranjang anda kosong </td>";
                                }

                            ?>
                        </tbody>      
                    </table>
                </div>
            </div>
        </div>

    

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_home.js"></script>
<?php require_once "assets/includes/footer_close.php"?>