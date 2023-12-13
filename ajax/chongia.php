<?php

include "../model/pdo.php";
include "../global.php";
include "../model/product.php";
include "../model/comment.php";

$value = $_POST['value'];
$products = list_product_price($value);
?>
<div class="row pb-3">
    <?php foreach ($products as $product) {
        extract($product);
        $rate = select_avg_rate($product_id);
        if (!empty($rate['avg_star']) && !empty($rate['total_star'])) {
            $avg_star = $rate['avg_star'];
            $total_star = $rate['total_star'];
        } else {
            $avg_star = 0;
            $total_star = 0;
        }
    ?>
        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4 border">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="<?= $dirt . $product_image ?>" alt="">
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" href="index.php?act=detailProduct&product_id=<?= $product_id ?>&product_code=<?= $product_code ?>"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="index.php?act=detailProduct&product_id=<?= $product_id ?>&product_code=<?= $product_code ?>"><?= $product_name ?></a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5><?= number_format($price, 0, ',', '.'); ?></h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <?php if ($avg_star < 1) { ?>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                        <?php } else if ($avg_star <= 1.2) { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                        <?php } else if ($avg_star <= 1.7) { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star-half-alt text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                        <?php } else if ($avg_star <= 2.2) { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                        <?php } else if ($avg_star <= 2.7) { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star-half-alt text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                        <?php } else if ($avg_star <= 3.2) { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                        <?php } else if ($avg_star <= 3.7) { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star-half-alt text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                        <?php } else if ($avg_star <= 4.2) { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="far fa-star text-warning mr-1"></small>
                        <?php } else if ($avg_star <= 4.7) { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star-half-alt text-warning mr-1"></small>
                        <?php } else { ?>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                        <?php } ?>
                        <small>(<?= $total_star ?>)</small>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>