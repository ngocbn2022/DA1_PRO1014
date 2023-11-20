<?php extract($product); ?>
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
                    <?php if ($avg_star <= 1.2) { ?>
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
                <h3 class="font-weight-semi-bold mb-4 text-danger">Giá: <?= $price ?></h3>
                <strong class="text-dark mr-3">Mô tả:</strong>
                <p class="mb-4"><?= $description ?></p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">Kích cỡ:</strong>
                    <form class="ps-1">
                        <div class="custom-control custom-radio custom-control-inline ">
                            <input type="radio" class="custom-control-input" id="size-1" name="size" value="XS">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <strong class="text-dark mr-3">Màu sắc:</strong>
                    <form class="ps-1">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color" value="Black">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>

                    </form>
                </div>
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
                    <form class="button-cart d-flex justify-content-center" method="POST" action="index.php?act=cart">
                        <input type="hidden" name="product_id" value="<?= $product_id ?>">
                        <input type="hidden" name="product_name" value="<?= $product_name ?>">
                        <input type="hidden" name="image" value="<?= $product_image ?>">
                        <input type="hidden" name="price" value="<?= number_format($price, 0, ',', '.'); ?>">
                        <input type="hidden" id="selectedSize" name="selectedsize" value="">
                        <input type="hidden" id="selectedColor" name="selectedcolor" value="">
                        <input type="hidden" id="selectedQuantity" name="quantity" value="">
                        <button class="btn btn-outline-primary px-3  mx-2" type="submit">
                            <i class="fa fa-shopping-cart mr-1 pe-1"></i>
                            Thêm giỏ hàng
                        </button>
                    </form>
                    <form class="button-cart d-flex justify-content-center" method="POST" action="index.php?act=order">
                        <input type="hidden" name="product_id" value="<?= $product_id ?>">
                        <input type="hidden" name="product_name" value="<?= $product_name ?>">
                        <input type="hidden" name="image" value="<?= $product_image ?>">
                        <input type="hidden" name="price" value="<?= $price ?>">
                        <input type="hidden" id="selectedSize" name="selectedsize" value="">
                        <input type="hidden" id="selectedColor" name="selectedcolor" value="">
                        <input type="hidden" id="selectedQuantity" name="quantity" value="">
                        <button class="btn btn-danger px-3  mx-2" type="submit">
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
                    <a class="nav-item nav-link text-dark active" href="#tab-pane-3">Đánh giá (0)</a>
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
                                        <div class="text-warning">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Nội dung: </label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Gửi đánh giá" class="btn btn-outline-primary px-3 mt-2">
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
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small class="fa fa-star text-warning mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products End -->