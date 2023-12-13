<?php
// hiển thị 5 sản phẩm có lượt bán nhiều nhất
function load_product_sale()
{
    $sql = "SELECT *, COUNT(cart.quantity) AS soluong, (COUNT(cart.quantity) / products.view * 100) as tilemua
    FROM cart 
    LEFT JOIN variants on cart.variant_id = variants.variant_id
    LEFT JOIN products on products.product_code = variants.product_code
    GROUP BY products.product_id
    ORDER BY soluong DESC limit 0,5";
    return pdo_query($sql);
}

// hiển thị tất cả sản phẩm theo từng danh mục
function load_thongke_sanpham_danhmuc()
{
    $sql = "SELECT *, COUNT(*) as soluong, MIN(price) as gia_min,
        Max(price) as gia_max, AVG(price) as giatrungbinh
        FROM categories 
        LEFT JOIN products
        ON categories.category_id = products.category_id
        GROUP BY categories.category_id, categories.category_id
        ORDER BY soluong ASC";
    return pdo_query($sql);
}

// hiển thị doanh thu theo tháng
function thongkedoanhthu()
{
    $sql = "SELECT 
    month_list.month,
    COALESCE(SUM(orders.total), 0) AS total
FROM 
    (
        SELECT '01' AS month
        UNION SELECT '02'
        UNION SELECT '03'
        UNION SELECT '04'
        UNION SELECT '05'
        UNION SELECT '06'
        UNION SELECT '07'
        UNION SELECT '08'
        UNION SELECT '09'
        UNION SELECT '10'
        UNION SELECT '11'
        UNION SELECT '12'
    ) AS month_list
LEFT JOIN orders ON MONTH(STR_TO_DATE(orders.timeorder, '%h:%i:%s - %d:%m:%Y')) = month_list.month
          AND YEAR(STR_TO_DATE(orders.timeorder, '%h:%i:%s - %d:%m:%Y')) = YEAR(CURRENT_DATE())
AND order_role = 2
GROUP BY 
    month_list.month
ORDER BY 
    month_list.month
";
    return pdo_query($sql);
}

// hiển thị tỉ lệ đơn hàng (đang vận chuyển, hoàn thành, hủy)
function tiledon()
{
    $sql = "SELECT 
    (COUNT(CASE WHEN order_role = 1 THEN 1 END) / COUNT(*)) * 100 AS dangvanchuyen,
    (COUNT(CASE WHEN order_role = 2 THEN 1 END) / COUNT(*)) * 100 AS thanhcong,
    (COUNT(CASE WHEN order_role = 3 THEN 1 END) / COUNT(*)) * 100 AS huy 
    FROM orders
";
    return pdo_query($sql);
}

/// hiển thị tổng doanh thu

function tongdoanhthu()
{
    $sql = "SELECT sum(total) as doanhthu FROM orders 
    WHERE order_role = 2";
    return pdo_query_one($sql);
}


// hiển thị số lượng người dùng

function count_users()
{
    $sql = "SELECT count(*) as count_user FROM users";
    return pdo_query_one($sql);
}

// hiển thị toàn bộ số lượng sản phẩm 

function count_product_all()
{
    $sql = "SELECT count(*) as count FROM products";
    return pdo_query_one($sql);
}

// hiển thị số lượng hàng tồn kho

function count_variant_quantity()
{
    $sql = "SELECT sum(quantity_variants) as countvariant FROM variants";
    return pdo_query_one($sql);
}
