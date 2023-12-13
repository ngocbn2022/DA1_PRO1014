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
                                <h3 class="text_white text-uppercase my-4">Thông tin tài khoản</h3>
                            </div>
                            <div class="modal-body">
                                <?php extract($account); ?>
                                <form class="d-flex flex-column p-3" method="POST" action="index.php?act=changeinfo">
                                    <div>
                                        <label for="" class="">Họ và tên</label>
                                        <input type="text" class="form-control mt-1" value="<?= $user_name ?>" disabled>
                                    </div>
                                    <div>
                                        <label for="" class="mt-3">Email</label>

                                        <input type="email" class="form-control mt-1" value="<?= $email ?>" disabled>
                                    </div>
                                    <div>
                                        <label for="" class="mt-3">Số điện thoại</label>
                                        <input type="text" class="form-control mt-1" value="0<?= $phone ?>" disabled>
                                    </div>
                                    <div>
                                        <label for="" class="mt-3">Địa chỉ</label>
                                        <input type="text" class="form-control mt-1" value="<?= $address ?>" disabled>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-outline-success">Thay đổi thông
                                            tin</button>
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