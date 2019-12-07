<?php require_once "assets/includes/header_dashboard_plg.php"?>

    <div class="container">
        <div class="row my-2">
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
                <img src="assets/images/user_images/<?php echo $_SESSION['FOTO_PROFIL_USER'];?>" alt="" class="rounded image-fluid image-object-fit">
            </div>
            <div class="col-lg-8">
                <h3 class="my-2"> Profile User </h3>
                <form method="post" id="formProfileUserDashboard">
                    <div class="form-group">
                        <label for="namaUserProfile" class="font-weight-bold"> Nama User  </label>
                        <input type="text" name="namaUserProfile" id="namaUserProfile" class="form-control" value="<?php echo $_SESSION['NAMA_USER'];?>" placeholder="Enter your name ...." disabled>
                    </div>
                    <div class="form-group">
                        <label for="alamatUserProfile" class="font-weight-bold"> Alamat User </label>
                        <textarea name="alamatUserProfile" id="alamatUserProfile" class="form-control" disabled><?php echo $_SESSION['ALAMAT_USER'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notelpUserProfile" class="font-weight-bold"> No. Handphone </label>
                        <input type="text" name="notelpUserProfile" id="notelpUserProfile" class="form-control" value="<?php echo $_SESSION['NO_HP_USER'];?>" placeholder="Enter your phone number...." disabled>
                    </div>
                    <div class="form-group">
                        <label for="emailUserProfile" class="font-weight-bold"> Email User </label>
                        <input type="text" name="emailUserProfile" id="emailUserProfile" class="form-control" value="<?php echo $_SESSION['EMAIL_USER'];?>" placeholder="Enter your email...." disabled>
                    </div>
                    <div class="form-group">
                        <label for="tanggalDaftarUser" class="font-weight-bold"> Tanggal Terdaftar </label>
                        <input type="text" name="tanggalDaftarUser" id="tanggalDaftarUser" class="form-control" value="<?php echo $_SESSION['TANGGAL_DAFTAR'];?>" placeholder="Enter your date here..." disabled>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-auto col-sm-6">
                        <a href="dashboard_plg_update_profile.php" class="btn btn-block mb-4 btn-primary"> Ubah Profil </a>
                    </div>
                    <div class="col-lg-auto col-sm-6">
                        <a href="dashboard_plg_update_password.php" class="btn btn-block mb-4 btn-outline-secondary"> Ubah Password </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_dashboard_profile.js"></script>
<?php require_once "assets/includes/footer_close.php"?>