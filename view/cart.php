<div class="container-fluid">
    <div class="row px-xl-5">
        <h2 class="text-center pb-5">Giỏ hàng</h2>
        <div class="col-lg-9 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <?php if (isset($carts) && $carts != "") { ?>
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Kích cỡ</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $tatol = 0;
                        $fee = 30000;
                        foreach ($carts as $cart) {
                            extract($cart);
                            $tatol += ($price * $quantity);
                        ?>
                            <tr>
                                <td class="align-middle text-start">
                                    <img src="<?= $dirt . $product_image ?>" alt="" style="width: 50px; margin-right: 10px;">
                                    <?= $product_name ?>
                                </td>
                                <td class="align-middle"><?= $color ?></td>
                                <td class="align-middle"><?= $size ?></td>
                                <td class="align-middle"><?= number_format($price, 0, ',', '.') ?></td>
                                <td class="align-middle">
                                    <?= $quantity ?></td>
                                <td class="align-middle"><?= number_format($price * $quantity, 0, ',', '.') ?></td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-sm btn-danger"><a href="index.php?act=delcart&cart_id=<?= $cart_id ?>" onclick="return confirmdelete()" class="text-white">Xóa</a></button>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <span>Giỏ hàng trống</span>
                    <?php } ?>
                    </tbody>
            </table>
        </div>

        <div class="col-lg-3">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Tóm tắt giỏ
                    hàng</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Thanh toán</h6>
                        <h6><?= number_format($tatol, 0, ',', '.') ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium"><?= number_format($fee, 0, ',', '.') ?></h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng thanh toán</h5>
                        <h5><?= number_format($fee + $tatol, 0, ',', '.') ?></h5>
                    </div>
                    <button class="btn btn-lg btn-danger font-weight-bold my-3">
                        <a href="index.php?act=order" class="text-white">Đặt hàng</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>