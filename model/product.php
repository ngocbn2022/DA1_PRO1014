<?php
// hiển thị 8 sản phẩm mới nhất 
function listProduct_new_home()
{
    $sql = "SELECT *, AVG(comments.star) as avg_star, COUNT(comments.star) as total_star 
    FROM products LEFT join comments 
    ON comments.product_id = products.product_id 
    WHERE comments.star > 0 AND product_role = 0
    GROUP BY products.product_id, products.product_name
    order by products.product_id desc limit 0,9";
    return pdo_query($sql);
}

// hiển thị 8 sản phẩm có lượt bán cao nhất
function listProduct_view_home()
{
    $sql = "SELECT *, AVG(comments.star) as avg_star, COUNT(comments.star) as total_star 
    FROM products LEFT join comments 
    ON comments.product_id = products.product_id 
    WHERE comments.star > 0 AND product_role = 0
    GROUP BY products.product_id, products.product_name
    order by products.view desc limit 0,9";
    return pdo_query($sql);
}

// hiển thị danh sách sản phẩm trong sản phẩm
function listProduct($category_id = 0, $keyword = "", $trang = 0, $sapxep = "")
{
    $sql = "SELECT *, AVG(comments.star) as avg_star, COUNT(comments.star) as total_star 
    FROM products LEFT join comments 
    ON comments.product_id = products.product_id 
    Left join categories 
    ON categories.category_id = products.category_id
    WHERE comments.star > 0 AND products.product_role = 0 ";
    if ($keyword != "") {
        $sql .= " and products.product_name like '%" . $keyword . "%'";
    }
    if ($category_id > 0) {
        $sql .= " and products.category_id ='" . $category_id . "'";
    }

    if ($sapxep == "") {
        $sql .= "GROUP BY products.product_id, products.product_name
        order by products.product_id desc";
    }

    if ($sapxep == "sapxeptheogiatangdan") {
        $sql .= "GROUP BY products.product_id, products.product_name
        order by products.price asc";
    }
    if ($sapxep == "sapxeptheogiagiamdan") {
        $sql .= "GROUP BY products.product_id, products.product_name
        order by products.price desc";
    }
    $sql .= " limit " . 0 + 9 * $trang . "," . 9 + 9 * $trang;
    return pdo_query($sql);
}
// hiển thị 1 sản phẩm
function product_one($product_id)
{
    $sql = "SELECT *, AVG(comments.star) as avg_star, COUNT(comments.star) as total_star 
    FROM products LEFT join comments 
    ON comments.product_id = products.product_id 
    WHERE products.product_id = '$product_id'
    GROUP BY products.product_id, products.product_name";
    return pdo_query_one($sql);
}

// hiển thị toàn bộ sản phẩm trang admin
function listProduct_admin($category_id = 0, $keyword = "")
{
    $sql = "SELECT * FROM products
    Left join categories 
    ON categories.category_id = products.category_id
    WHERE products.product_role = 0 ";
    if ($keyword != "") {
        $sql .= " and products.product_name like '%" . $keyword . "%'";
    }
    if ($category_id > 0) {
        $sql .= " and products.category_id ='" . $category_id . "'";
    }

    $sql .= "order by products.product_id DESC";
    return pdo_query($sql);
}

// hiển thị thùng rác sản phẩm trang admin
function listProduct_recycle_admin($category_id = 0, $keyword = "")
{
    $sql = "SELECT * FROM products
    Left join categories 
    ON categories.category_id = products.category_id
    WHERE products.product_role = 1 ";
    if ($keyword != "") {
        $sql .= " and products.product_name like '%" . $keyword . "%'";
    }
    if ($category_id > 0) {
        $sql .= " and products.category_id ='" . $category_id . "'";
    }

    $sql .= "order by products.product_id DESC";
    return pdo_query($sql);
}

// xóa mềm sản phẩm
function delete_mem_product($product_id) {
    $sql = "UPDATE products SET product_role = 1 WHERE product_id = '$product_id' ";
    pdo_execute($sql);
}

// khôi phục sản phẩm
function  restore_product($product_id) {
    $sql = "UPDATE products SET product_role = 0 WHERE product_id = '$product_id' ";
    pdo_execute($sql);
}

// đếm số lượng sản phẩm theo danh mục
function count_product($category_id) {
    $sql = "SELECT COUNT(product_name) as quantityProduct
    FROM products 
    WHERE category_id = '$category_id'
    GROUP BY products.product_id, products.product_name
    ";

    return pdo_query_one($sql);
}