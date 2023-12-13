<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Bảng điều khiển</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
            <div class="col-lg-3">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tổng doanh thu</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body d-flex align-items-center justify-content-center" style="height:140px">
                            <h3 class="f_w_900 mb-0 me-2 text-success">+<?= number_format($tongdoanhthu['doanhthu'], 0, ',', '.');  ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tổng đơn hàng</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body d-flex align-items-center justify-content-center" style="height:140px">
                            <h4 class="f_w_900 f_s_60 mb-0 me-2"><?= $countorder['countorder'] ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Số lượng người dùng</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body d-flex align-items-center justify-content-center" style="height:140px">
                            <h4 class="f_w_900 f_s_60 mb-0 me-2"><?= $count_users['count_user'] ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Số lượng hàng tồn kho</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body d-flex align-items-center justify-content-center" style="height:140px">
                            <h4 class="f_w_900 f_s_60 mb-0 me-2"><?= $count_tonkho['countvariant'] ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 card_height_100">
                    <div class="white_card mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Doanh thu</h3>
                                </div>
                                <div class="float-lg-right float-none sales_renew_btns justify-content-end">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Theo tháng</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="white_card_body" style="height: 286px;">
                            <canvas id="bar"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 card_height_100 mb_20">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tổng sản phẩm: <?=$count_product['count']?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card_container">
                                <div id="platform_type_dates_donut" style="height:240px"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tóm tắt đơn hàng</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body mt_10">
                            <?php ?>
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="mb_20">Đang vận chuyển</h3>
                                </div>
                            </div>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="<?= $tiledon[0][0] ?>"></span>
                            </div>
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="mb_20">Hoàn thành</h3>
                                </div>
                            </div>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="<?= $tiledon[0][1] ?>"></span>
                            </div>
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="mb_20">Hủy</h3>
                                </div>
                            </div>
                            <div id="bar4" class="barfiller mb-0">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="<?= $tiledon[0][2] ?>"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="white_card card_height_100 mb_20 ">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Top sản phẩm bán chạy</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body QA_section">
                            <div class="QA_table ">
                                <table class="table lms_table_active2 p-0 text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Lượt bán</th>
                                            <th scope="col">Lượt xem</th>
                                            <th scope="col">Tỉ lệ chuyển đổi (bán/xem)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($productsale as $value) {
                                            extract($value);
                                        ?>
                                            <tr>
                                                <td class="align-middle text-start">
                                                    <img src="<?= '../' . $dirt . $product_image ?>" alt="" style="width: 45px; margin-right: 10px;">
                                                    <?= $product_name ?>
                                                </td>
                                                <td><?= number_format($price, 0, ',', '.') ?></td>
                                                <td><?= $soluong ?></td>
                                                <td><?= $view ?></td>
                                                <td><?=$tilemua?>%</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    </div>