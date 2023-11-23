<?php
// hiển thị bình luận từng sản phẩm
function comments ($product_id) {
    $sql = "SELECT * FROM comments 
    WHERE product_id = $product_id AND star = 0"; 
    return pdo_query($sql);
}
// hiển thị đánh giá từng sản phẩm
function rates ($product_id) {
    $sql = "SELECT * FROM comments 
    WHERE product_id = $product_id and star > 0";  
    return pdo_query($sql);
}
// hiển thị trung bình đánh giá sản phẩm

function select_avg_rate($product_id){
    $sql = "SELECT AVG(comments.star) as avg_star, COUNT(comments.star) as total_star 
    FROM comments 
    WHERE product_id = '$product_id' AND star > 0
    GROUP BY product_id";
    return pdo_query_one($sql);
}

// thêm bình luận
function insert_comment ($username, $content, $time, $star, $product_id) {
    $sql = "INSERT INTO comments (username, content, `time`, star, product_id) 
    VALUES ('$username', '$content','$time', '$star', '$product_id')";
    pdo_execute($sql);
}

// hiển thị toàn bộ bình luận
function comment_all(){
    $sql = "SELECT * FROM comments WHERE comment_role = 0"; 
    return pdo_query($sql);
}
// hiển thị toàn bộ bình luận thùng rác
function recyclecomment_all(){
    $sql = "SELECT * FROM comments WHERE comment_role = 1"; 
    return pdo_query($sql);
}
// xóa mềm bình luận
function deletecomments ($comment_id) {
    $sql = "UPDATE comments SET comment_role = 1 WHERE comment_id = '$comment_id'";
    pdo_execute($sql);
}

// khôi phục bình luận
function restorecomments ($comment_id) {
    $sql = "UPDATE comments SET comment_role = 0 WHERE comment_id = '$comment_id'";
    pdo_execute($sql);
}

// xóa cứng bình luận

function hard_delete_comment($comment_id) {
    $sql = "DELETE FROM comments WHERE comment_id = '$comment_id'";
    pdo_execute($sql);
}

// đếm số lượng đánh giá

function count_rate($product_id) {
    $sql = "SELECT count(comment_id) as quantityComment
    FROM comments
    WHERE  star > 0 AND product_id = '$product_id'
    GROUP BY product_id";
    return pdo_query_one($sql);
}

// đếm số lượng comment
function count_comment($product_id) {
    $sql = "SELECT count(comment_id) as quantityComment
    FROM comments
    WHERE  star = 0 AND product_id = '$product_id'
    GROUP BY product_id";
    return pdo_query_one($sql);
}
