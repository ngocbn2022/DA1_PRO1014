<?php extract($product); ?>
<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Cập nhật sản phẩm: <?=$product_id?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-5 mt-5">
                <form action="index.php?act=updateproduct&product_id=<?=$product_id?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="product_name" value="<?= $product_name ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ảnh sản phẩm</label><br>
                        <img src="../image/<?= $product_image ?>" alt="" width="200px" height="250px">
                        <input type="file" class="form-control mt-3" id="exampleFormControlInput1" name="product_image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="price" value="<?= $price ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?= $description ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Danh mục</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <?php foreach ($listcategory as $category) {
                                if ($category_id == $category['category_id']) { ?>
                                    <option selected value="<?= $category['category_id'] ?>">
                                        <?= $category['category_name'] ?>
                                    </option>
                                <?php } else { ?>
                                    <option value="<?= $category['category_id'] ?>">
                                        <?= $category['category_name'] ?>
                                    </option>
                            <?php }
                            } ?>

                        </select>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name="update_product">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
