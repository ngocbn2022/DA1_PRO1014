<?php 
// hiển thị toàn bộ size của variant
function loadall_size($product_id) {
    $sql = "SELECT * FROM variants 
    LEFT JOIN sizes ON variants.size_id = sizes.size_id
    WHERE product_id = '$product_id'";
    return pdo_query($sql); 
}

// hiển thị toàn bộ color của variant
function loadall_color($product_id) {
    $sql = "SELECT * FROM variants 
    LEFT JOIN colors ON variants.color_id = colors.color_id
    WHERE product_id = '$product_id'";
    return pdo_query($sql); 
}


// hiển thị 1 variant

function load_variant ($product_id, $color_id, $size_id){
    $sql = "SELECT * FROM variants
    WHERE product_id = '$product_id' AND color_id = '$color_id' AND size_id = '$size_id'";
    return pdo_query_one($sql);
}