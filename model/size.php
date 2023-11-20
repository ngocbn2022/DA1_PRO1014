<?php 
// hiển thị toàn bộ size
function loadall_size() {
    $sql = "SELECT * FROM sizes";
    return pdo_query($sql); 
}