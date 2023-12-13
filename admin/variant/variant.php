<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách biến thể sản phẩm: <?= $product_code ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-5 mt-5">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã biến thể</th>
                            <th scope="col">Màu</th>
                            <th scope="col">Kích cỡ</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($variant as $value) {
                            extract($value);
                        ?>
                            <tr>
                                <th scope="row"><?= $variant_id ?></th>
                                <td><?= $color ?></td>
                                <td><?= $size ?></td>
                                <td>
                                    <form action="index.php?act=listvariant&variant_id=<?= $variant_id ?>&product_code=<?= $product_code ?>" method="post">
                                        <input type="text" id="" value="<?= $quantity_variants ?>" name="quantity">
                                        <button type="submit" class="btn btn-outline-success" name="updatevariant">Cập nhật</button>
                                    </form>
                                </td>
                                <td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>