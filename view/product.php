<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3 text-center">Lọc sản phẩm</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <a href="index.php?act=product&page=1" >
                            <input type="radio" class="custom-control-input" id="price-0" value="0" name="price" checked>
                            <label class="custom-control-label" for="price-0">Tất cả</label>
                        </a>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-1" value="1" onclick="chon_btn_gia(1)" name="price">
                        <label class="custom-control-label" for="price-1" onclick="chon_btn_gia(1)">100.000 - 200.000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-2" value="2" onclick="chon_btn_gia(2)" name="price">
                        <label class="custom-control-label" for="price-2" onclick="chon_btn_gia(2)">200.000 - 300.000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-3" value="3" onclick="chon_btn_gia(3)" name="price">
                        <label class="custom-control-label" for="price-3" onclick="chon_btn_gia(3)">300.000 - 400.000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-4" value="4" onclick="chon_btn_gia(4)" name="price">
                        <label class="custom-control-label" for="price-4" onclick="chon_btn_gia(4)">400.000 - 500.000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-5" value="5" onclick="chon_btn_gia(5)" name="price">
                        <label class="custom-control-label" for="price-5" onclick="chon_btn_gia(5)">500.00 trở lên</label>
                    </div>
                </form>

            </div>
            <!-- Price End -->

        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8 listproduct">
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
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php for ($index = 1; $index <= ($page + 1); $index++) {
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
        <script>
            function chon_btn_gia(value) {
                $.ajax({
                    url: "ajax/chongia.php",
                    method: "POST",
                    data: {
                        value: value
                    },
                    success: function(data) {
                        $(".listproduct").html(data);
                    }
                });
            }
        </script>
        <!-- Shop Product End -->
    </div>
</div>