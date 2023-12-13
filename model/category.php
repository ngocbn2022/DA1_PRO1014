<?php
// hiển thị toàn bộ danh mục
function listCategories() {
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);
}
// thêm dnah mục
function add_category ($category_name, $category_image) {
    $sql = "INSERT INTO categories (category_name, category_image) 
    VALUES ('$category_name', '$category_image')";
    pdo_execute($sql);
}
// sửa danh mục
function update_category ($category_id, $category_name, $category_image) {
    $sql = "UPDATE categories 
    SET category_name = '$category_name', category_image = '$category_image' 
    WHERE category_id = '$category_id'";

    pdo_execute($sql);
}


// hiển thị 1 danh mục

function load_category($category_id) {
    $sql = "SELECT * FROM categories WHERE category_id = '$category_id'";
    return pdo_query_one($sql);
}