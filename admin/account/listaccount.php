<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách sản phẩm</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">Mật khẩu</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Quyền truy cập</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accounts as $account) {
                            extract($account);
                        ?>
                            <tr>
                                <td scope="row"><?= $user_id ?></td>
                                <td><?= $user_name ?></td>
                                <td><?= $password ?></td>
                                <td><?= $email ?></td>
                                <td><?= $phone ?></td>
                                <td><?= $address ?></td>
                                <td><?= $user_role == 1 ? 'Quản trị' : 'Khách hàng' ?></td>
                                <td>
                                    <form action="index.php?act=listaccount&user_id=<?= $user_id ?>" method="post">
                                        <?= $user_role == 0 ?
                                            '<button type="submit" class="btn btn-sm btn-outline-success" name="capquyen" onclick="return cofirmcapquyen()">Cấp quyền quản trị</button>' :
                                            '<button type="submit" class="btn btn-sm btn-outline-danger" name="haquyen" onclick="return cofirmhaquyen()">Hạ quyền quản trị</button>' ?>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>