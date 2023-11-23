<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Lọc sản phẩm</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <h4 class="custom-control-label" for="price-all">Theo giá</h4>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <a href="<?= $url . '&sapxep=sapxeptheogiagiamdan'?>">Giá giảm dần</a>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <a href="<?= $url . '&sapxep=sapxeptheogiatangdan'?>">Giá tăng dần</a>
                    </div>

                </form>
            </div>
            <!-- Price End -->

            <!-- Color Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by color</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="color-all">
                        <label class="custom-control-label" for="price-all">All Color</label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-1">
                        <label class="custom-control-label" for="color-1">Black</label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-2">
                        <label class="custom-control-label" for="color-2">White</label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-3">
                        <label class="custom-control-label" for="color-3">Red</label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-4">
                        <label class="custom-control-label" for="color-4">Blue</label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="color-5">
                        <label class="custom-control-label" for="color-5">Green</label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                </form>
            </div>
            <!-- Color End -->

            <!-- Size Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by size</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="size-all">
                        <label class="custom-control-label" for="size-all">All Size</label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-1">
                        <label class="custom-control-label" for="size-1">XS</label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-2">
                        <label class="custom-control-label" for="size-2">S</label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-3">
                        <label class="custom-control-label" for="size-3">M</label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-4">
                        <label class="custom-control-label" for="size-4">L</label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="size-5">
                        <label class="custom-control-label" for="size-5">XL</label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                </form>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <?php foreach ($listProduct as $product) {
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
                                    <a class="btn btn-outline-dark btn-square" href="index.php?act=detailProduct&product_id=<?=$product_id?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="index.php?act=detailProduct&product_id=<?=$product_id?>"><?= $product_name ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?= number_format($price, 0, ',', '.'); ?></h5>
                                    <h6 class="text-muted ml-2"><del><?= number_format($price, 0, ',', '.'); ?></del></h6>
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
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php for ($index = 1; $index <= 5; $index++) {
                                if (isset($_GET['page'])) {
                                    if ($_GET['page'] == $index) { ?>
                                        <li class="page-item active"><a class="page-link" href="<?= $url . '&page=' . $index ?>"><?= $index ?></a></li>
                                    <?php } else { ?>
                                        <li class="page-item"><a class="page-link" href="<?= $url . '&page=' . $index ?>"><?= $index ?></a></li>
                            <?php  }
                                }
                            } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>