<?php extract($product);
if (!empty($rate['avg_star']) && !empty($rate['total_star'])) {
    $avg_star = $rate['avg_star'];
    $total_star = $rate['total_star'];
} else {
    $avg_star = 0;
    $total_star = 0;
}
?>
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?= $dirt . $product_image ?>" alt="Image">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3><?= $product_name ?></h3>
                <div class="d-flex align-items-center mb-1">
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
                    <small>(<?= $total_star ?> Đánh giá)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4 text-danger">Giá: <?= number_format($price, 0, ',', '.') ?></h3>
                <strong class="text-dark mr-3">Mô tả:</strong>
                <p class="mb-4"><?= $description ?></p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">Kích cỡ:</strong>
                    <form class="ps-1">
                        <?php
                        $indexSize = 0;
                        foreach ($sizes as $size) {
                            extract($size);
                            $indexSize++;
                        ?>
                            <div class="custom-control custom-radio custom-control-inline ">
                                <input type="radio" class="custom-control-input" id="size-<?= $indexSize ?>" name="size" value="<?= $size_id ?>" onclick="chon_btn_size(<?= $product_code ?>,<?= $size_id ?>)">
                                <label class="custom-control-label" for="size-<?= $indexSize ?>" onclick="chon_btn_size(<?= $product_code ?>,<?= $size_id ?>)"><?= $size ?></label>
                            </div>
                        <?php } ?>
                    </form>
                </div>
                <div class="d-flex mb-4 color">
                    <strong class="text-dark mr-3">Màu sắc:</strong>
                    <form class="ps-1">
                        <?php
                        $indexColor = 0;
                        foreach ($colors as $color) {
                            extract($color);
                            $indexColor++;
                        ?>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color<?= $indexColor ?>" name="color" value="<?= $color_id ?>">
                                <label class="custom-control-label" for="color<?= $indexColor ?>"><?= $color ?></label>
                            </div>
                        <?php } ?>
                    </form>
                </div>
                <script>
                    function chon_btn_size(product_code, size_id) {
                        $.ajax({
                            url: "ajax/chonsize.php",
                            method: "POST",
                            data: {
                                product_code: product_code,
                                size_id: size_id,
                            },
                            success: function(data) {
                                $(".color").html(data);
                            }
                        });
                    }

                    function chon_btn_color() {
                        selectedColor = $('input[name="color"]:checked').val();
                        $('.selectedColor').val(selectedColor);
                    }
                </script>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <strong class="text-dark mr-3 me-2">Số lượng:</strong>
                    <div class="input-group quantity mr-3" style="width: 100px;">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-outline-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control form-control-sm border border-1 border-primary text-center" name="quantity" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-outline-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="button-cart d-flex justify-content-center">
                    <form class="button-cart d-flex justify-content-center" method="POST" action="index.php?act=cart&product_code=<?= $product_code ?>">
                        <input type="hidden" name="product_name" value="<?= $product_name ?>">
                        <input type="hidden" name="image" value="<?= $product_image ?>">
                        <input type="hidden" name="price" value="<?= number_format($price, 0, ',', '.'); ?>">
                        <input type="hidden" class="selectedSize" name="selectedsize" value="">
                        <input type="hidden" class="selectedColor" name="selectedcolor" value="">
                        <input type="hidden" id="selectedQuantity" name="quantity" value="">
                        <button class="btn btn-outline-primary px-3  mx-2" type="submit" name="addtocart">
                            <i class="fa fa-shopping-cart mr-1 pe-1"></i>
                            Thêm giỏ hàng
                        </button>
                    </form>
                    <form class="button-cart d-flex justify-content-center" method="POST" action="index.php?act=order&product_code=<?= $product_code ?>">
                        <input type="hidden" name="product_name" value="<?= $product_name ?>">
                        <input type="hidden" name="image" value="<?= $product_image ?>">
                        <input type="hidden" name="price" value="<?= $price ?>">
                        <input type="hidden" class="selectedSize" name="selectedsize" value="">
                        <input type="hidden" class="selectedColor" name="selectedcolor" value="">
                        <input type="hidden" id="selectedQuantity" name="quantity" value="">
                        <button class="btn btn-danger px-3 mx-2" type="submit" name="addtoorder">
                            <i class="fa fa-shopping-cart mr-1 pe-1"></i>
                            Đặt hàng
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" href="#tab-pane-3">Đánh giá</a>
                </div>
                <div>
                    <div>
                        <div class="row">
                            <div class="col-md-8">
                                <iframe src="view/review.php" frameborder="1" width="100%" height="100%"></iframe>
                            </div>
                            <div class="col-md-4">
                                <?php if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != "") { ?>
                                    <h4 class="mb-4">Để lại đánh giá của bạn</h4>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Đánh giá của bạn :</p>
                                        <form class="ps-1">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="rate-5" name="rate" value="5">
                                                <label class="custom-control-label" for="rate-5">5 sao</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="rate-4" name="rate" value="4">
                                                <label class="custom-control-label" for="rate-4">4 sao</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="rate-3" name="rate" value="3">
                                                <label class="custom-control-label" for="rate-3">3 sao</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="rate-2" name="rate" value="2">
                                                <label class="custom-control-label" for="rate-2">2 sao</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="rate-1" name="rate" value="1">
                                                <label class="custom-control-label" for="rate-1">1 sao</label>
                                            </div>
                                        </form>
                                    </div>
                                    <form method="post" action="index.php?act=detailProduct&product_id=<?= $product_id ?>&product_code=<?= $product_code ?>">
                                        <input type="hidden" id="selectedRate" name="rate" value="">
                                        <div class="form-group">
                                            <label for="message">Nội dung: </label>
                                            <textarea id="message" cols="30" rows="5" class="form-control" name="content"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Gửi đánh giá" class="btn btn-outline-primary px-3 mt-2" name="click_sendrate">
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <h4>Bạn phải đăng nhập mới có thể đánh giá ? <a href="index.php?act=login">Đăng nhập</a></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" href="#tab-pane-3">Bình luận</a>
                </div>
                <div>
                    <div>
                        <div class="row">
                            <div class="col-md-8">
                                <iframe src="view/comment.php" frameborder="1" width="100%" height="100%"></iframe>
                            </div>
                            <div class="col-md-4">
                                <?php if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != "") { ?>
                                    <h4 class="mb-4">Để lại bình luận của bạn</h4>
                                    <form method="post" action="index.php?act=detailProduct&product_id=<?= $product_id ?>&product_code=<?= $product_code ?>">
                                        <input type="hidden" id="selectedRate" name="rate" value="">
                                        <div class="form-group">
                                            <label for="message">Nội dung: </label>
                                            <textarea id="message" cols="30" rows="5" class="form-control" name="content"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Gửi đánh giá" class="btn btn-outline-primary px-3 mt-2" name="click_sendrate">
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <h4>Bạn phải đăng nhập mới có thể bình luận? <a href="index.php?act=login">Đăng nhập</a></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-light pr-3">Gợi ý cho
            bạn</span></h2>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                <?php foreach ($list_product_same as $product) {
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
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?= $dirt . $product_image ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="index.php?act=detailProduct&product_id=<?= $product_id ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?= $product_name ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><?= number_format($price, 0, ',', '.') ?></h5>
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
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Products End -->