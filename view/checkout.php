<form class="container-fluid" method="POST" action="index.php?act=order" enctype="application/x-www-form-urlencoded">
    <div class="row px-xl-5">
        <h2 class="text-center pb-5">Đơn hàng</h2>
        <div class="col-lg-3">
            <h3 class="text-center">Thông tin khách hàng</h3>
            <?php extract($account); ?>

            <div class="col-md-12 form-group mt-2">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" id="company" name="name" placeholder="Company name" value="<?php echo $user_name ?>" />
            </div>
            <div class="col-md-12 form-group mt-2">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" id="tel" name="tel" value="0<?php echo $phone ?>" />

            </div>
            <div class="col-md-12 form-group mt-2">
                <label for="">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>" />
            </div>
            <div class="col-md-12 form-group mt-2">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" id="email" name="address" value="<?php echo $address ?>" />
            </div>
        </div>
        <div class="col-lg-9 table-responsive mb-5">
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
                    $tatol = 0;
                    $fee = 30000;
                    if (!isset($_POST['addtoorder'])) {
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
                            </tr>
                        <?php }
                    } else {
                        $tatol = ((int)$price * (int)$quantity);
                        ?>
                        <tr>
                            <td class="align-middle text-start">
                                <img src="<?= $dirt . $product_image ?>" alt="" style="width: 50px; margin-right: 10px;">
                                <?= $product_name ?>
                            </td>
                            <td class="align-middle"><?= $color['color'] ?></td>
                            <td class="align-middle"><?= $size['size'] ?></td>
                            <td class="align-middle"><?= number_format($price, 0, ',', '.') ?></td>
                            <td class="align-middle">
                                <?= $quantity ?></td>
                            <td class="align-middle"><?= number_format($tatol, 0, ',', '.') ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="bg-light p-30 mb-5 mt-5">
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
                        <input type="text" class="h5 border border-0" value="<?= number_format($fee + $tatol, 0, ',', '.') ?>" disabled>
                        <input type="hidden" name="total" id="" value="<?= $fee + $tatol ?>">
                    </div>
                    <div>
                        <h6 class="mt-2">Phương thức thanh toán</h6>
                    </div>
                    <input type="hidden" name="product_code" value="<?= $product_code ?>">
                    <input type="hidden" name="size" value="<?=isset($size_id1) ? $size_id1 : '0'?>">
                    <input type="hidden" name="color" value="<?=isset($color_id1) ? $color_id1 : '0'?>">
                    <input type="hidden" id="selectedQuantity" name="quantity" value="<?=$quantity?>">

                    <input type="submit" class="bg-danger text-white border border-danger px-4 py-2" value="Thanh toán khi nhận hàng" name="thanhtoan">
                    <input type="submit" class="bg-danger text-white border border-danger px-4 py-2" value="Thanh toán momo" name="thanhtoanmomo">
                </div>
            </div>
        </div>
    </div>
</form>