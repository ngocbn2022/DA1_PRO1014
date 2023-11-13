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

// hiển thị 8 sản phẩm có view cao nhất
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

// hiển thị 8 sản phẩm đánh giá cao nhất
// thay bằng sản phẩm bán chạy nhất
function listProduct_star_home()
{
    $sql = "SELECT *, AVG(comments.star) as avg_star, COUNT(comments.star) as total_star 
    FROM products LEFT join comments 
    ON comments.product_id = products.product_id 
    WHERE comments.star > 0 AND product_role = 0
    GROUP BY products.product_id, products.product_name
    order by avg_star desc limit 0,9";
    return pdo_query($sql);
}

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
    $sql .= " limit " . 0+9*$trang ."," . 9+9*$trang;
    return pdo_query($sql);
}
