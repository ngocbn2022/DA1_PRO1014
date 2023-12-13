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
                            <h4 class="text-center my-4">Mã đơn hàng: <?=$_GET['order_name']?></h4>
                            <div class="col-lg-12 table-responsive mb-5 mt-3">
                                <table class="table table-light table-borderless table-hover text-center mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Màu sắc</th>
                                            <th>Kích cỡ</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <?php 
                                        foreach ($listproduct as $product) {
                                            extract($product); 
                                            ?>
                                            <tr>
                                                <td class="align-middle text-start">
                                                    <img src="<?= $dirt . $product_image ?>" alt="" style="width: 50px; margin-right: 10px;">
                                                    <?=$product_name?>
                                                </td>
                                                <td class="align-middle"><?=$color?></td>
                                                <td class="align-middle"><?=$size?></td>
                                                <td class="align-middle"><?=number_format($price, 0, ',', '.')?></td>
                                                <td class="align-middle"><?=$quantity?></td>
                                                <td class="align-middle"><?=number_format($quantity * $price, 0, ',', '.')?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>