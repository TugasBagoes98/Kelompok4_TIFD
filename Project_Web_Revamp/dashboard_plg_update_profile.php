<?php require_once "assets/includes/header_dashboard_plg.php"?>

    <div class="container">
        <div class="row my-2">
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
                <img src="assets/images/user_images/<?php echo $_SESSION['FOTO_PROFIL_USER'];?>" alt="" class="rounded image-fluid image-object-fit">
            </div>
            <div class="col-lg-8">
                <h3 class="my-2"> Profile User </h3>
                <form method="post" id="formProfileUpdateUser" action="assets/includes/update_profile_user.php">
                    <div class="form-group">
                        <label for="namaUserProfile" class="font-weight-bold"> Nama User  </label>
                        <input type="text" name="namaUserProfile" id="namaUserProfile" class="form-control" value="<?php echo $_SESSION['NAMA_USER'];?>" placeholder="Enter your name ...." >
                        <div class="valid-feedback" id="validUpdateNama">Bagus!</div>
                        <div class="invalid-feedback" id="invalidUpdateNama"></div>
                    </div>
                    <div class="form-group">
                        <label for="alamatUserProfile" class="font-weight-bold"> Alamat User </label>
                        <textarea name="alamatUserProfile" id="alamatUserProfile" class="form-control" ><?php echo $_SESSION['ALAMAT_USER'];?></textarea>
                        <div class="valid-feedback" id="validUpdateAlamat">Bagus!</div>
                        <div class="invalid-feedback" id="invalidUpdateAlamat"></div>
                    </div>
                    <div class="form-group">
                        <label for="notelpUserProfile" class="font-weight-bold"> No. Handphone </label>
                        <input type="text" name="notelpUserProfile" id="notelpUserProfile" class="form-control" value="<?php echo $_SESSION['NO_HP_USER'];?>" placeholder="Enter your phone number...." >
                        <div class="valid-feedback" id="validUpdateNotelp">Bagus!</div>
                        <div class="invalid-feedback" id="invalidUpdateNotelp"></div>
                    </div>
                    <div class="form-group">
                        <label for="emailUserProfile" class="font-weight-bold"> Email User </label>
                        <input type="text" name="emailUserProfile" id="emailUserProfile" class="form-control" value="<?php echo $_SESSION['EMAIL_USER'];?>" placeholder="Enter your email...." disabled>
                    </div>
                    <div class="form-group">
                        <label for="tanggalDaftarUser" class="font-weight-bold"> Tanggal Terdaftar </label>
                        <input type="text" name="tanggalDaftarUser" id="tanggalDaftarUser" class="form-control" value="<?php echo $_SESSION['TANGGAL_DAFTAR'];?>" placeholder="Enter your date here..." disabled>
                    </div>
                    <div class="row">
                        <div class="col-lg-auto col-sm-6">
                            <button class="btn btn-block mb-4 btn-primary" name="saveUpdateProfile"> Simpan Perubahan </button>
                        </div>
                        <div class="col-lg-auto col-sm-6">
                            <button class="btn btn-block mb-4 btn-outline-secondary" name="cancelUpdateProfile"> Batal Merubah </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_dashboard_profile_update.js"></script>
<?php require_once "assets/includes/footer_close.php"?>