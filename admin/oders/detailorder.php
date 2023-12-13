<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Mã đơn hàng: <?= $order_name ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-5 mt-5">
                <table class="table table-bordered text-center table-hover">
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
                                    <img src="<?= '../' . $dirt . $product_image ?>" alt="" style="width: 50px; margin-right: 10px;">
                                    <?= $product_name ?>
                                </td>
                                <td class="align-middle"><?= $color ?></td>
                                <td class="align-middle"><?= $size ?></td>
                                <td class="align-middle"><?= number_format($price, 0, ',', '.') ?></td>
                                <td class="align-middle"><?= $quantity ?></td>
                                <td class="align-middle"><?= number_format($quantity * $price, 0, ',', '.') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>