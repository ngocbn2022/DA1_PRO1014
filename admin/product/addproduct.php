<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Thêm sản phẩm</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <form action="index.php?act=addproduct" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="product_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="product_image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Danh mục</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <?php foreach ($listcategory as $category) {
                                extract($category);
                            ?>
                                <option value="<?= $category_id ?>"><?= $category_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="reset" class="btn btn-secondary mx-2">Nhập lại</button>
                        <button type="submit" class="btn btn-success mx-2" name="add_product">Thêm mới</button>
                    </div>
                </form>
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