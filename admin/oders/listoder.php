<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner p-0">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách đơn hàng</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-5 mt-5">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên đơn hàng</th>
                            <th scope="col">Số lượng sản phẩm</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Người dùng</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Pttt</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Cập nhật trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        foreach ($orders as $order) {
                            extract($order);
                            $index++;
                        ?>
                            <tr>
                                <th scope="row"><?= $index ?></th>
                                <td><?= $order_name ?></td>
                                <td><?= $count_pro ?></td>
                                <td><?= number_format($total, 0, ',', '.') ?></td>
                                <td><?= $user_name ?></td>
                                <td><?= $timeorder ?></td>
                                <td><?= $payment == 1? 'Khi nhận hàng' : 'Online' ?></td>
                                <td>
                                    <?php if ($order_role == 0) { ?>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Chờ xử lý</button>
                                    <?php } else if ($order_role == 1) { ?>
                                        <button type="button" class="btn btn-sm btn-warning">Đang vận chuyển</button>
                                    <?php } else if ($order_role == 2) { ?>
                                        <button type="button" class="btn btn-sm btn-success">Hoàn thành</button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-sm btn-danger">Đã hủy</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <form action="index.php?act=listorders&order_name=<?= $order_name ?>" method="post">
                                        <?php if ($order_role == 0) { ?>
                                            <button type="submit" class="btn btn-sm btn-outline-primary" name="chapnhandonhang" onclick="return cofirmchapnhan()">Chấp nhận</button>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" name="huydonhang" onclick="return cofirmhuy()">Hủy</button>
                                        <?php } else if ($order_role == 1) { ?>
                                            <button type="submit" class="btn btn-sm btn-outline-success" name="chapnhandonhang" onclick="return cofirmchapnhan()">Hoàn thành</button>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" name="huydonhang" onclick="return cofirmhuy()">Hủy</button>
                                        <?php } ?>
                                    </form>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary"><a href="index.php?act=detailorder&order_name=<?=$order_name?>">Xem đơn</a></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>