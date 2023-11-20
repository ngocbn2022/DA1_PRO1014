<?php 
// hiển thị toàn bộ màu sắc
function loadall_color() {
    $sql = "SELECT * FROM colors";
    return pdo_query($sql); 
}