<?php
// hiển thị toàn bộ danh mục
function listCategories() {
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);
}