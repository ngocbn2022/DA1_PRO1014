<?php
// đếm đơn hàng
function countorders()
{
    $sql = "SELECT COUNT(order_id) as countorder FROM orders";
    return pdo_query_one($sql);
}
// thêm vào giỏ hàng 
function addtocart($quantity, $user_id, $variant_id)
{
    $sql = "INSERT INTO cart (quantity, user_id, variant_id)
    VALUES ('$quantity', '$user_id', '$variant_id')";
    pdo_execute($sql);
}

// mua hàng trực tiếp 
function addtocart_tt($quantity, $user_id, $variant_id, $ordername)
{
    $sql = "INSERT INTO cart (quantity, user_id, variant_id, order_name)
    VALUES ('$quantity', '$user_id', '$variant_id', '$ordername')";
    pdo_execute($sql);
}

// hiển thị giỏ hàng 
function load_cart($user_id)
{
    $sql = "SELECT * FROM cart 
    LEFT JOIN variants ON variants.variant_id = cart.variant_id
    LEFT JOIN products ON products.product_code = variants.product_code
    LEFT JOIN colors ON variants.color_id = colors.color_id
    LEFT JOIN sizes ON variants.size_id = sizes.size_id
    WHERE user_id = '$user_id' AND order_name = 0
    ORDER BY cart_id DESC";
    return pdo_query($sql);
}

// xóa 1 sản phẩm trong cart

function delcart($cart_id)
{
    $sql = "DELETE FROM cart WHERE cart_id = '$cart_id'";
    pdo_execute($sql);
}

// đếm sản phẩm trong giỏ hàng

function count_cart($user_id)
{
    $sql = "SELECT COUNT(cart_id) AS count
    FROM cart
    WHERE user_id = '$user_id' AND order_name = 0
    GROUP BY user_id";
    return pdo_query_one($sql);
}

// đặt hàng

function dathang($ordername, $payment, $total, $ordertime, $user_id)
{
    $sql = "INSERT INTO orders (order_name, payment, total, timeorder, user_id)
    VALUES ('$ordername', '$payment', '$total', '$ordertime', '$user_id')";
    pdo_execute($sql);
}

// thêm chi tiết đơn hàng

function adddetailorder($order_name, $user_id)
{
    $sql = "UPDATE cart SET order_name = '$order_name' 
    WHERE user_id = '$user_id' AND order_name = 0";
    pdo_execute($sql);
}


// hiện toàn bộ đơn hàng admin

function loadall_order()
{
    $sql = "SELECT *, count(cart.quantity) as count_pro 
    FROM orders 
    LEFT JOIN cart ON orders.order_name = cart.order_name
    LEFT JOIN users ON orders.user_id = users.user_id
    GROUP BY orders.order_name
    ORDER BY order_id DESC";
    return pdo_query($sql);
}

// hiện toàn bộ đơn hàng client

function loadall_order_client($user_id)
{
    $sql = "SELECT *, count(cart.quantity) as count_pro 
    FROM orders LEFT JOIN cart ON orders.order_name = cart.order_name
    WHERE orders.user_id = '$user_id' AND orders.order_role <> 3
    GROUP BY orders.order_name
    ORDER BY orders.order_id DESC";
    return pdo_query($sql);
}
// hiển thị chi tiết đơn hàng
function load_detailorder($name_order)
{
    $sql = "SELECT * FROM cart 
    LEFT JOIN variants ON variants.variant_id = cart.variant_id
    LEFT JOIN products ON products.product_code = variants.product_code
    LEFT JOIN sizes ON variants.size_id = sizes.size_id
    LEFT JOIN colors ON colors.color_id = variants.color_id
    WHERE cart.order_name = '$name_order'";
    return pdo_query($sql);
}

// chấp nhận đơn hàng

function acceptorder($order_name)
{
    $sql = "UPDATE orders SET order_role = order_role + 1 
    WHERE order_name = '$order_name'";
    pdo_execute($sql);
}
// hủy đơn hàng

function cancelorder($order_name)
{
    $sql = "UPDATE orders SET order_role = 3 
    WHERE order_name = '$order_name'";
    pdo_execute($sql);
}

// hiển thị 1 đơn hàng

function load_order($order_name)
{
    
    $sql = "SELECT * FROM orders
    LEFT JOIN cart ON cart.order_name = orders.order_name
    WHERE cart.order_name = '$order_name'";
    return pdo_query($sql);
}
