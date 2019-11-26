<?php require_once "assets/includes/header.php";?>

    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries -->
            <div class="col-md-8">
                <h1 class="my-4">
                    Selamat datang di blog kami
                    <small>
                        Selamat menikmati
                    </small>
                </h1>
                <div class="card mb-4">
                    <img src="assets/images/slider-001.jpg" alt="Post Image" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title"> Perkembangan Trend Komputer untuk 2020 mendatang </h2>
                        <p class="card-text text-justify">
                            Tidak bisa dipungkiri lagi, teknologi semakin cepat berkembang. Hampir semua
                            lapisan masyarakat dan semua kalangan mengenal apa itu <em>Internet</em>.
                            Semua serba otomatis dan mudah digunakan, membuat kita semakin dimanja dan
                            bergantung kepada solusi IT saat ini.
                        </p>
                        <a href="#" class="btn btn-outline-primary"> Read More </a>
                    </div>
                    <div class="card-footer text-muted">
                        Oleh <a href="">Ilham Jaya Kusuma</a>, 29 Nov 2019.
                    </div>
                </div>
                <div class="card mb-4">
                    <img src="assets/images/slider-002.jpg" alt="Post Image" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title"> <em> Internet of Things </em> mulai mejadi trend masa kini ?</h2>
                        <p class="card-text text-justify">
                            <em> Internet of Things </em> atau yang biasa dikenal sebagai <em> IoT </em> merupakan era
                            yang muncul bersamaan dengan Industri 4.0. Pada era ini, seluruh teknologi yang digunakan
                            oleh manusia terhubung dengan <em> Internet </em> guna mempermudah aktifitas. Seperti absensi
                            online yang memberikan daftar kehadiran dan perkembangan siswa secara <em> real time </em> dari
                            mana saja dan kapan saja.
                        </p>
                        <a href="#" class="btn btn-outline-primary"> Read More </a>
                    </div>
                    <div class="card-footer text-muted">
                        Oleh <a href="">Ilham Jaya Kusuma</a>, 30 Nov 2019
                    </div>
                </div>
                <div class="card mb-4">
                    <img src="assets/images/slider-003.jpg" alt="Post Image" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title"> Benarkah kita cenderung mengganti <em> gadget </em> kita setahun 2 kali ?</h2>
                        <p class="card-text">
                            <em> Gadget </em> atau yang biasa kita kenal sebagai <em> Smartphone </em> dan sejenisnya merupakan
                            kebutuhan pada era <em> Internet of Things </em>. Namun seiring dengan berkembangnya teknologi, muncul
                            sifat <em> konsumtif </em> yang mendorong kita untuk mengganti <em> gadget </em> ketika muncul teknologi
                            yang lebih baru.
                        </p>
                        <a href="#" class="btn btn-outline-primary"> Read More </a>
                    </div>
                    <div class="card-footer text-muted">
                        Oleh <a href="">Ilham Jaya Kusuma</a>, 01 Des 2019
                    </div>
                </div>
                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link"> 1 </a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"> 2 </a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"> 3 </a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar Widgets -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header"> Search </h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for ...">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary"> Go! </button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Category Widget -->
                <div class="card my-4">
                    <h5 class="card-header"> Category </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href=""> Bisnis </a>
                                    </li>
                                    <li>
                                        <a href=""> Komputer </a>
                                    </li>
                                    <li>
                                        <a href=""> Gadget </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href=""> Laptop </a>
                                    </li>
                                    <li>
                                        <a href=""> Keyboard </a>
                                    </li>
                                    <li>
                                        <a href=""> Graphic Card</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Widget -->
                <div class="card my-4">
                    <h5 class="card-header"> Sidebar Widget </h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your e-mail ...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary"> Subscribe </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End --> 

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<?php require_once "assets/includes/footer_close.php"?>