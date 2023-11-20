<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
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
            <div class="col-lg- col-6 text-left">
                <form class="d-flex" role="search" method="POST" action="index.php?act=listproduct">
                    <select name="category_id" id="" class="-2">
                        <option value="0">Tất cả</option>
                        <?php foreach ($listCategories as $category) {
                            extract($category);
                        ?>
                            <option value="<?= $category_id ?>"><?= $category_name ?></option>
                        <?php } ?>
                    </select>
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" name="keyword">
                    <button class="btn btn-light" type="submit">Search</button>
                </form>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Lượt bán</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listProduct as $product) {
                            extract($product);
                        ?>
                            <tr>
                                <th scope="row"><?= $product_id ?></th>
                                <td><?= $product_name ?></td>
                                <td>
                                    <img src="<?= '../' . $dirt . $product_image ?>" alt="" width="50px">
                                </td>
                                <td><?= $price ?></td>
                                <td><?= $description ?></td>
                                <td><?= $product_id ?></td>
                                <td><?= $category_name ?></td>
                                <td>
                                    <a href=""><button type="button" class="btn btn-primary">Xem</button></a>
                                    <a href="index.php?act=updateproduct&product_id=<?= $product_id ?>"><button type="button" class="btn btn-success">Sửa</button></a>
                                    <a href="index.php?act=deleteproduct&product_id=<?= $product_id ?>"><button type="button" class="btn btn-danger" onclick="return confirmdelete();">Xóa</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2023 - Designed by DucNgoc<a href="#"> <i class="ti-heart"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>