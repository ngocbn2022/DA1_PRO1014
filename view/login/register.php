<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="modal-content" style="height: auto">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h3 class="text_white text-uppercase">Đăng ký</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="d-flex flex-column border p-3" method="post">
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
                                        <div>
                                            <input type="email" class="form-control mt-3" placeholder="Email" name="email">
                                            <?php if (isset($error3)) { ?>
                                                <span class="register-error ms-1"><?= $error3 ?></span>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <input type="tel" class="form-control mt-3" placeholder="Số điện thoại" name="numberphone">
                                            <?php if (isset($error4)) { ?>
                                                <span class="register-error ms-1"><?= $error4 ?></span>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <input type="text" class="form-control mt-3" placeholder="Địa chỉ" name="address">
                                            <?php if (isset($error5)) { ?>
                                                <span class="register-error ms-1"><?= $error5 ?></span>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <input type="password" class="form-control mt-3" placeholder="Xác nhận mật khẩu" name="comfirm">
                                            <?php if (isset($error6)) { ?>
                                                <span class="register-error ms-1"><?= $error6 ?></span>
                                            <?php } ?>
                                            <?php if (isset($error7)) { ?>
                                                <span class="register-error ms-1"><?= $error7 ?></span>
                                            <?php } ?>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn btn-outline-primary" name="dangky">Đăng ký</button>
                                        </div>
                                        <div class="text-center pt-2">
                                            <p>Bạn đã có tài khoản? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="index.php?act=login"> Đăng
                                                    nhập</a></p>
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