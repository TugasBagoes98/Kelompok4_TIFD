<?php require_once "assets/includes/header_dashboard_plg.php"?>

    <div class="container">
        <div class="row my-2">
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
                <img src="assets/images/user_profile_img.jpeg" alt="" class="img-thumbnail image-fluid image-object-fit">
            </div>
            <div class="col-lg-8">
                <h3 class="my-2"> Profile User </h3>
                <form action="" method="post" id="formProfileUserDashboard">
                    <div class="form-group">
                        <label for="namaUserProfile" class="font-weight-bold"> Nama User  </label>
                        <input type="text" name="namaUserProfile" id="namaUserProfile" class="form-control" value="" placeholder="Enter your name ....">
                    </div>
                    <div class="form-group">
                        <label for="alamatUserProfile" class="font-weight-bold"> Alamat User </label>
                        <textarea name="alamatUserProfile" id="alamatUserProfile" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notelpUserProfile" class="font-weight-bold"> No. Handphone </label>
                        <input type="text" name="notelpUserProfile" id="notelpUserProfile" class="form-control" placeholder="Enter your phone number....">
                    </div>
                    <div class="form-group">
                        <label for="emailUserProfile" class="font-weight-bold"> Email User </label>
                        <input type="text" name="emailUserProfile" id="emailUserProfile" class="form-control" placeholder="Enter your email....">
                    </div>
                    <div class="form-group">
                        <label for="tanggalDaftarUser" class="font-weight-bold"> Tanggal Terdaftar </label>
                        <input type="text" name="tanggalDaftarUser" id="tanggalDaftarUser" class="form-control" placeholder="Enter your date here...">
                    </div>
                    <div class="row">
                        <div class="col-lg-auto col-sm-6">
                            <button class="btn btn-block mb-4 btn-primary"> Ubah Profil </button>
                        </div>
                        <div class="col-lg-auto col-sm-6">
                            <button class="btn btn-block mb-4 btn-outline-secondary"> Ubah Password </button>
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
<?php require_once "assets/includes/footer_close.php"?>