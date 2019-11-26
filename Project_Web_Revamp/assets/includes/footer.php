    <!-- Footer Start -->
    <footer class="bg-dark p-2">
        <p class="text-center text-white m-0"> &copy; MaCo Team Production 2019 </p>
    </footer>
    <!-- Footer End -->

    <!-- Modal Login Start -->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLoginTitle"> Login </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="login_plg.php">
                        <div class="form-group">
                            <label for="usernameLogin" class="col-form-label"> Username : </label>
                            <input type="text" name="usernameLogin" id="usernameLogin" class="form-control" placeholder="Enter your username ...">
                        </div>
                        <div class="form-group">
                            <label for="passwordLogin" class="col-form-label"> Password : </label>
                            <input type="password" name="passwordLogin" id="passwordLogin" class="form-control" placeholder="Enter your password ...">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="checkRememberMe" id="checkRememberMe" class="form-check-input">
                            <label for="checkRememberMe" class="form-check-label"> Remember Me </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"> Login </button>
                    </form>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <a href="#" class="text-decoration-none"> Belum punya akun ? Daftar disini. </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="#modalLupaPassword" class="text-decoration-none" data-toggle="modal" role="button" data-dismiss="modal"> Lupa password ? Klik disini. </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- Modal Login End -->

    <!-- Modal Login Start -->
    <div class="modal fade" id="modalLupaPassword" tabindex="-1" role="dialog" aria-labelledby="modalLupaPasswordTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLupaPasswordTitle"> Forgot Password </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for=""> Email : </label>
                            <div class="input-group">
                                <input type="email" name="lupaPasswordUser" id="lupaPasswordUser" class="form-control" placeholder="Enter your email ....">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-block btn-outline-primary"> Kirim </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <a href="#" class="text-decoration-none"> Belum punya akun ? Daftar disini. </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="#modalLogin" class="text-decoration-none" role="button" data-toggle="modal" data-dismiss="modal"> Sudah punya akun ? Klik disini. </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- Modal Login End -->

    <!-- Modal Warning Login Start -->
    <div class="modal fade" id="modalWarning" tabindex="-1" role="dialog" aria-labelledby="modalWarningLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalWarningLabel"> Peringatan </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead" id="modalWarningMessage"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-info" type="button"data-dismiss="modal"> Ya, Saya mengerti </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Warning Login End -->  

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>    
    <script src="assets/javascript/bootstrap.js"></script>
    <script src="assets/javascript/script.js"></script>
</body>
</html>