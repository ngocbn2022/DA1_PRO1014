<?php extract($category); ?>
<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner p-0">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Sửa danh mục</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-5 mt-5">
                <form action="index.php?act=updatecategory&category_id=<?=$category_id?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên danh mục</label>
                        <input type="text" name="category_name" class="form-control" id="exampleFormControlInput1" value="<?= $category_name ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ảnh danh mục</label><br>
                        <img src="<?= '../' . $dirt . 'categories/' . $category_image ?>" alt="" width="50px">
                        <input type="file" name="category_image" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success mx-2" name="update_category">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
