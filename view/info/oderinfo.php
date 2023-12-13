<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="white_box mb_30">
                <div class="row">
                    <div class="col-lg-3 border border-1 p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link border border-1 active" aria-current="page" href="index.php?act=info">Thông tin tài khoản</a>
                            </li>
                            <li class="nav-item border border-1">
                                <a class="nav-link" href="index.php?act=changepassword">Đổi mật khẩu</a>
                            </li>
                            <li class="nav-item border border-1">
                                <a class="nav-link" href="index.php?act=oderinfo">Đơn hàng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 border border-1">
                        <div class="modal-content">
                            <h2 class="text-center my-4">Đơn hàng</h2>
                            <div class="col-lg-12 table-responsive mb-5">
                                <table class="table table-light table-borderless table-hover text-center mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Đơn hàng</th>
                                            <th>Số lượng sản phẩm</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <?php foreach ($listorders as $order) {

                                            extract($order); ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <?= $order_name ?>
                                                </td>
                                                <td class="align-middle">
                                                    <?= $count_pro ?>
                                                </td>
                                                <td><?= number_format($total, 0, ',', '.') ?></td>
                                                <td class="align-middle">
                                                    <?php if ($order_role == 0) { ?>
                                                        <button type="button" class="btn btn-outline-danger">Chờ xử lý</button>
                                                    <?php } else if ($order_role == 1) { ?>
                                                        <button type="button" class="btn btn-warning">Đang vận chuyển</button>
                                                    <?php } else if ($order_role == 2) { ?>
                                                        <button type="button" class="btn btn-success">Hoàn thành</button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-danger">Đã hủy</button>
                                                    <?php } ?>
                                                </td>
                                                <td class="align-middle">
                                                    <form action="index.php?act=oderinfo&order_id=<?= $order_id ?>" method="POST">
                                                        <button type="button" class="btn btn-sm btn-primary">
                                                            <a href="index.php?act=detailorder&order_name=<?= $order_name ?>" class="text-white">Xem chi tiết</a>
                                                        </button>
                                                        <?php if ($order_role == 0) { ?>
                                                            <button type="submit" class="btn btn-sm btn-danger" name="huydonhang" onclick="return cofirmcofirmhuy()">Hủy đơn hàng</button>
                                                        <?php } ?>
                                                    </form>
                                                </td>
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