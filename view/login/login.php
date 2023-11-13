<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="modal-content" style="height: 500px">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h3 class="text_white text-uppercase">Đăng nhập</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="d-flex flex-column border p-3" method="POST" action="">
                                        <div>
                                            <input type="text" class="form-control mt-3" placeholder="Tên tài khoản" name="username">
                                            <?php if (isset($error1)) { ?>
                                                <span class="register-error ms-1"><?= $error1 ?></span>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <input type="password" class="form-control mt-3" placeholder="Mật khẩu" name="password">
                                            <?php if (isset($error2)) { ?>
                                                <span class="register-error ms-1"><?= $error2 ?></span>
                                            <?php } ?>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn btn-outline-primary" name="dangnhap">Đăng nhập</button>
                                        </div>
                                        <div class="text-center pt-2">
                                            <p>Bạn chưa có tài khoản? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="index.php?act=register"> Đăng
                                                    ký</a></p>
                                        </div>
                                        <div class="text-center">
                                            <a href="index.php?act=misspassword" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Quên mật khẩu</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>