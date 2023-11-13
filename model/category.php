<?php
function listCategories() {
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);
}