<?php require_once "assets/includes/header.php";?>

    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4"> Selamat datang di website kami </h1>
                <h2 class="my-4"> Registrasi </h2>
                <form action="assets/includes/register_plg.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group my-4">
                                <label for="namaUser"> Nama : </label>
                                <input type="text" name="namaUser" id="namaUser" class="form-control" placeholder="Enter your name ....">
                            </div>
                            <div class="form-group my-4">
                                <label for="alamatUser"> Alamat : </label>
                                <textarea name="alamatUser" id="alamatUser" class="form-control w-100" placeholder="Enter your address ...."></textarea>
                            </div>
                            <div class="form-group my-4">
                                <label for="notelpUser"> No. Handphone : </label>
                                <input type="text" name="notelpUser" id="notelpUser" class="form-control" placeholder="Enter your phone number ....">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group my-4">
                                <label for="emailUser"> Email : </label>
                                <input type="email" name="emailUser" id="emailUser" class="form-control" placeholder="Enter your email ...." >
                            </div>
                            <div class="form-group my-4">
                                <label for="passwordUser"> Password : </label>
                                <input type="password" name="passwordUser" id="passwordUser" class="form-control" placeholder="Enter your password ....">
                                <small id="passwordHelper" class="form-text text-muted">
                                    Password harus lebih panjang dari 8 karakter dan tidak boleh melebihi 20 karakter.
                                </small>
                            </div>
                            <div class="from-group my-4">
                                <label for="fotoProfilUser"> Foto Profil : </label>
                                <input type="file" name="fotoProfilUser" id="fotoProfilUser" class="form-control-file">
                                <small id="fileHelper" class="form-text text-muted">
                                    Ukuran file tidak boleh melebihi 500kb dan harus bertipe .jpg .jpeg .png
                                </small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-outline-primary"> Register </button>
                </form>
                <a href="" class="my-2 d-inline-block text-decoration-none"> Sudah memiliki akun ? Klik disini. </a>
            </div>
        </div>
    </div>
    <!-- Container End -->


<?php require_once "assets/includes/footer.php";?>