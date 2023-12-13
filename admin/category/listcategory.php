<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner p-0">
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
            <div class="container-fluid pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listCategories as $category) {
                            extract($category);
                        ?>
                            <tr>
                                <th scope="row"><?= $category_id ?></th>
                                <td><?= $category_name ?></td>
                                <td>
                                    <img src="<?= '../' . $dirt . 'categories/' . $category_image ?>" alt="" width="50px">
                                </td>
                                <td>
                                    <a href="index.php?act=updatecategory&category_id=<?= $category_id ?>"><button type="button" class="btn btn-success">Sửa</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
