<?php 
// hiển thị toàn bộ size của variant
function loadall_size_variant($product_code) {
    $sql = "SELECT * FROM variants 
    LEFT JOIN sizes ON variants.size_id = sizes.size_id
    WHERE variants.product_code = '$product_code' AND variants.quantity_variants > 0
    GROUP BY variants.size_id
    ";
    return pdo_query($sql); 
}

// hiển thị toàn bộ color của variant
function loadall_color_variant($product_code, $size_id = 0) {
    $sql = "SELECT * FROM variants 
    LEFT JOIN colors ON variants.color_id = colors.color_id
    WHERE variants.product_code = '$product_code'";
    if ($size_id > 0) {
        $sql .= " AND variants.size_id = '$size_id'";
    }
    $sql .= "AND variants.quantity_variants > 0
    GROUP BY variants.color_id";
    return pdo_query($sql); 
}

// hiển thị size theo siez_id

function load_size($size_id) {
    $sql = "SELECT `size` FROM sizes
    WHERE size_id = '$size_id'";
    return pdo_query_one($sql);
}

// hiển thị color theo siez_id

function load_color($color_id) {
    $sql = "SELECT `color` FROM colors
    WHERE color_id = '$color_id'";
    return pdo_query_one($sql);
}
// hiển thị toàn bộ color
function loadall_color() {
    $sql = "SELECT * FROM colors ";
    return pdo_query($sql); 
}

// hiển thị toàn bộ size của 
function loadall_size() {
    $sql = "SELECT * FROM sizes";
    return pdo_query($sql); 
}

// hiển thị toàn bộ variant
function loadall_variant() {
    $sql = "SELECT * FROM variants";
    return pdo_query($sql);
}

// hiển thị 1 variant

function load_variant ($product_code, $color_id, $size_id){
    $sql = "SELECT * FROM variants
    WHERE product_code = '$product_code' AND color_id = '$color_id' AND size_id = '$size_id'";
    return pdo_query_one($sql);
}

// trừ lượt bán khi admin chấp nhận đơn hàng

function minus_quantity_variants($vatiant_id, $quantity) {
    $sql = "UPDATE variants SET quantity_variants = quantity_variants - $quantity
    WHERE variant_id = '$vatiant_id'";
    pdo_execute($sql);
}

// trả lại lượt bán khi hủy
function plus_quantity_variants($vatiant_id, $quantity) {
    $sql = "UPDATE variants SET quantity_variants = quantity_variants + $quantity
    WHERE variant_id = '$vatiant_id'";
    pdo_execute($sql);
}

// hiển thị toàn bộ biến thể của sản phẩm 1

function load_variant_product($product_code) {
    $sql = "SELECT * FROM variants 
    LEFT JOIN products ON products.product_code = variants.product_code
    LEFT JOIN sizes ON variants.size_id = sizes.size_id
    LEFT JOIN colors ON colors.color_id = variants.color_id
    WHERE variants.product_code = '$product_code'";
    return pdo_query($sql);
}

// thêm variant
function addvariant ($product_code, $color_id, $size_id) {
    $sql = "INSERT INTO variants(product_code, color_id, size_id)
    VALUES ('$product_code' , '$color_id', '$size_id')";
    pdo_execute($sql);
}


// sửa số lượng variant

function updatevariant($variant_id, $quantity) {
    $sql = "UPDATE variants SET quantity_variants = '$quantity' 
    WHERE variant_id = '$variant_id'";
    pdo_execute($sql);
}