<?php
// hiển thị 8 sản phẩm mới nhất 
function listProduct_new_home()
{
    $sql = "SELECT * FROM products 
    WHERE  product_role = 0
    order by products.product_id desc limit 0,8";
    return pdo_query($sql);
}

// hiển thị 8 sản phẩm có lượt bán cao nhất
function listProduct_view_home()
{
    $sql = "SELECT * FROM products 
    WHERE  product_role = 0
    order by products.view desc limit 0,8";
    return pdo_query($sql);
}

// hiển thị danh sách sản phẩm trong sản phẩm
function listProduct($category_id = 0, $keyword = "", $trang = 0, $sapxep = "")
{
    $sql = "SELECT * FROM products Left join categories 
    ON categories.category_id = products.category_id
    WHERE products.product_role = 0 ";
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
    $sql = "SELECT * FROM products  
    WHERE products.product_id = '$product_id'";
    return pdo_query_one($sql);
}
// hiển thị sản phẩm cùng loại

function list_product_same($category_id, $product_id) {
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
    GROUP BY category_id";

    return pdo_query_one($sql);
}

// thêm sản phẩm 
function insert_product($product_name, $product_image, $price, $description, $category_id) {
    $sql = "INSERT INTO products (product_name, product_image, price, description,category_id) 
    VALUE ('$product_name', '$product_image', '$price', '$description', '$category_id')";
    pdo_execute($sql);
}

// sửa sản phẩm 

function update_product($product_id, $product_name, $product_image, $price, $description, $category_id) {
    $sql = "UPDATE products 
    SET product_name = '$product_name', product_image = '$product_image', price = '$price', description = '$description', category_id='$category_id'
    WHERE product_id = '$product_id'";
    pdo_execute($sql);
}


// thêm vào giỏ hàng 
function addtocart ($quantity, $user_id, $variant_id) {
    $sql = "INSERT INTO cart (quantity, user_id, variant_id)
    VALUES ('$quantity', '$user_id', '$variant_id')";
    pdo_execute($sql);
}

// hiển thị giỏ hàng 
function load_cart ($user_id) {
    $sql = "SELECT * FROM cart 
    LEFT JOIN variants ON variants.variant_id = cart.variant_id
    LEFT JOIN products ON products.product_id = variants.product_id 
    LEFT JOIN colors ON variants.color_id = colors.color_id
    LEFT JOIN sizes ON variants.size_id = sizes.size_id
    WHERE user_id = '$user_id'";
    return pdo_query($sql);
}

// xóa 1 sản phẩm trong cart

function delcart($cart_id) {
    $sql = "DELETE FROM cart WHERE cart_id = '$cart_id'";
    pdo_execute($sql);
}