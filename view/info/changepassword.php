<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="white_box mb_30">
                <div class="row">
                    <div class="col-lg-3 border border-1 p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link border border-1 active" aria-current="page" href="index.php?act=info">Thông tin tài khoản</a>
                            </li>
                            <li class="nav-item border border-1">
                                <a class="nav-link" href="index.php?act=changepassword">Đổi mật khẩu</a>
                            </li>
                            <li class="nav-item border border-1">
                                <a class="nav-link" href="index.php?act=oderinfo">Đơn hàng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 border border-1">
                        <div class="modal-content" style="height: 500px">
                            <div class="modal-header justify-content-center theme_bg_1">
                                <h3 class="text_white text-uppercase my-4">Đổi mật khẩu</h3>
                            </div>
                            <div class="modal-body">
                                <form class="d-flex flex-column border p-3" method="post" action="index.php?act=changepassword">
                                    <div>
                                        <input type="password" class="form-control mt-3" placeholder="Nhập mật khẩu cũ" name="password">
                                        <?php if (isset($error2)) { ?>
                                            <span class="register-error ms-1"><?= $error2 ?></span>
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <input type="password" class="form-control mt-3" placeholder="Nhập mật khẩu mới" name="newpassword">
                                        <?php if (isset($error1)) { ?>
                                            <span class="register-error ms-1"><?= $error1 ?></span>
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <input type="password" class="form-control mt-3" placeholder="Xác nhận mật khẩu mới" name="comfirm">
                                        <?php if (isset($error1)) { ?>
                                            <span class="register-error ms-1"><?= $error1 ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-outline-primary" name="changepassword">Đổi mật khẩu</button>
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