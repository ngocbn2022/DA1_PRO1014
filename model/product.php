<?php
// hiển thị 8 sản phẩm mới nhất 
function listProduct_new_home()
{
    $sql = "SELECT * FROM products 
    WHERE  product_role = 0
    order by product_id desc limit 0,8";
    return pdo_query($sql);
}

// hiển thị 8 sản phẩm có lượt bán cao nhất
function listProduct_sale_home()
{
    $sql = "SELECT *, COUNT(cart.quantity) AS soluong, (COUNT(cart.quantity) / products.view * 100) as tilemua
    FROM cart 
    LEFT JOIN variants on cart.variant_id = variants.variant_id
    LEFT JOIN products on products.product_code = variants.product_code
    GROUP BY products.product_id
    ORDER BY soluong DESC limit 0,8";
    return pdo_query($sql);
}

// hiển thị danh sách sản phẩm trong sản phẩm
function listProduct($category_id = 0, $keyword = "", $trang = 0)
{
    $sql = "SELECT * FROM products 
    Left join categories ON categories.category_id = products.category_id
    LEFT JOIN variants ON variants.product_code = products.product_code
    WHERE products.product_role = 0 AND variants.quantity_variants > 0";
    if ($keyword != "") {
        $sql .= " and products.product_name like '%" . $keyword . "%'";
    }
    if ($category_id > 0) {
        $sql .= " and products.category_id ='" . $category_id . "'";
    }
    $sql .= " GROUP BY products.product_code ORDER BY product_id DESC limit " . 0 + 9 * $trang . "," . 9 + 9 * $trang;
    return pdo_query($sql);
}
// hiển thị 1 sản phẩm
function product_one($product_id)
{
    $sql = "SELECT * FROM products   
    WHERE products.product_id = '$product_id'";
    return pdo_query_one($sql);
}
// hiển thị sản phẩm cùng loại

function list_product_same($category_id, $product_id)
{
    $sql = "SELECT * FROM products  
    WHERE category_id = '$category_id' AND product_id <> '$product_id'";
    return pdo_query($sql);
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
function delete_mem_product($product_id)
{
    $sql = "UPDATE products SET product_role = 1 WHERE product_id = '$product_id' ";
    pdo_execute($sql);
}

// khôi phục sản phẩm
function  restore_product($product_id)
{
    $sql = "UPDATE products SET product_role = 0 WHERE product_id = '$product_id' ";
    pdo_execute($sql);
}

// đếm số lượng sản phẩm theo danh mục
function count_product($category_id)
{
    $sql = "SELECT COUNT(product_name) as quantityProduct
    FROM products 
    WHERE category_id = '$category_id'
    GROUP BY category_id";

    return pdo_query_one($sql);
}

// thêm sản phẩm 
function insert_product($product_name, $product_code, $product_image, $price, $description, $category_id)
{
    $sql = "INSERT INTO products (product_name,product_code, product_image, price, `description`,category_id) 
    VALUE ('$product_name', '$product_code', '$product_image', '$price', '$description', '$category_id')";
    pdo_execute($sql);
}

// sửa sản phẩm 

function update_product($product_id, $product_name, $product_image, $price, $description, $category_id)
{
    $sql = "UPDATE products 
    SET product_name = '$product_name', product_image = '$product_image', price = '$price', description = '$description', category_id='$category_id'
    WHERE product_id = '$product_id'";
    pdo_execute($sql);
}
// tăng view 
function tangview($product_id)
{
    $sql = "UPDATE products set view = view + 1 WHERE product_id='$product_id'";
    pdo_execute($sql);
}

// hiển thị sản phẩm theo color

function list_product_price($value = 0)
{
    $sql = "SELECT * FROM products 
    LEFT JOIN variants ON variants.product_code = products.product_code
    WHERE  variants.quantity_variants > 0";
    if ($value == 1) {
        $sql .= " AND products.price >= 100000 AND products.price < 200000";
    }
    if ($value == 2) {
        $sql .= " AND products.price >= 200000 AND products.price < 300000";
    }
    if ($value == 3) {
        $sql .= " AND products.price >= 300000 AND products.price < 400000";
    }
    if ($value == 4) {
        $sql .= " AND products.price >= 400000 AND products.price <= 500000";
    }
    if ($value == 5) {
        $sql .= " AND products.price > 500000 ";
    }
    $sql .= " GROUP BY products.product_code ORDER BY products.product_id DESC ";
    return pdo_query($sql);
}


// đếm sản phẩm 

function countproduct()
{
    $sql = "SELECT COUNT(*) / 9 as `page` FROM products ";
    return pdo_query_one($sql);
}
