<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item position-relative active" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Áo nam</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Tôi sẽ có một khoảng thời gian tuyệt vời
                                     Sân là một nơi tuyệt vời để đứng. </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Áo nữ</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Tôi sẽ có một khoảng thời gian tuyệt vời
                                     Sân là một nơi tuyệt vời để đứng. </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/carousel-3.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Áo đẹp</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Tôi sẽ có một khoảng thời gian tuyệt vời
                                     Sân là một nơi tuyệt vời để đứng. </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/offer-1.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Giảm giá 20%</h6>
                    <h3 class="text-white mb-3">Đề nghị đặc biệt</h3>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/offer-2.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Giảm giá 20%</h6>
                    <h3 class="text-white mb-3">Đề nghị đặc biệt</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid pt-1">
    <div class="row px-xl-5 pb-1">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light justify-content-center mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h6 class="font-weight-semi-bold m-0 ps-3">Sản phẩm chất lượng</h6>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light justify-content-center mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h6 class="font-weight-semi-bold m-0 ps-3">Miễn phí vận chuyển</h6>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light justify-content-center mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h6 class="font-weight-semi-bold m-0 ps-3">Đổi trả trong 14 ngày</h6>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light justify-content-center mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h6 class="font-weight-semi-bold m-0 ps-3">Hỗ trợ 24/7</h6>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->

<!-- Danh mục Start -->
<div class="container-fluid pt-2">
    <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-light pr-3">Danh mục</span>
    </h5>
    <div class="row px-xl-5 pb-3">
        <?php



        foreach ($listCategories as $category) {
            extract($category);
            $quantityproduct = count_product($category_id);

        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="index.php?act=product&category_id=<?= $category_id ?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="<?= $dirt . 'categories/' . $category_image ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3 ps-1">
                            <h6><?= $category_name ?></h6>
                            <small class="text-body"><?= $quantityproduct['quantityProduct'] ?> Sản phẩm</small>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Danh mục End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="col-lg-12">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-light pr-3">Top Sản
                phẩm mới nhất</span></h5>
        <div class="row px-xl-5">
            <?php foreach ($listProduct_new_home as $productNew) {
                extract($productNew);
                $rate = select_avg_rate($product_id);
                if (!empty($rate['avg_star']) && !empty($rate['total_star'])) {
                    $avg_star = $rate['avg_star'];
                    $total_star = $rate['total_star'];
                } else {
                    $avg_star = 0;
                    $total_star = 0;
                }
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
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

    </div>
</div>
<!-- Products End -->
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="col-lg-12">
        <h5 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-light pr-3">Top Sản
                phẩm
                bán chạy nhất</span></h5>
        <div class="row px-xl-5">
            <?php foreach ($listProduct_sale_home as $productView) {
                extract($productView);
                $rate = select_avg_rate($product_id);
                if (!empty($rate['avg_star']) && !empty($rate['total_star'])) {
                    $avg_star = $rate['avg_star'];
                    $total_star = $rate['total_star'];
                } else {
                    $avg_star = 0;
                    $total_star = 0;
                }
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4 border">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?= $dirt . $product_image ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="index.php?act=detailProduct&product_id=<?= $product_id ?>&product_code=<?= $product_code ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="index.php?act=detailProduct&product_id=<?= $product_id ?>&product_id=<?= $product_id ?>"><?= $product_name ?></a>
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

    </div>
</div>
<!-- Products End -->