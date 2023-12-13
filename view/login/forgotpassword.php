<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="modal-content" style="height: 500px">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h3 class="text_white text-uppercase">Quên mật khẩu</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="d-flex flex-column border p-3" method="post" action="index.php?act=forgotpassword">
                                        <div>
                                            <input type="email" class="form-control mt-3" placeholder="Nhập email" name="email">
                                            <?php if (isset($err)) { ?>
                                                <span class="register-error ms-1"><?= $err ?></span>
                                            <?php } ?>
                                        </div>

                                        <div class="d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn btn-outline-primary" name="submit_forgot">Quên mật khẩu</button>
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