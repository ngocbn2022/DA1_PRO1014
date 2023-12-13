<?php

include "../model/pdo.php";
include "../model/variant.php";

$size_id = $_POST['size_id'];
$product_code = $_POST['product_code'];
$sizes = loadall_color_variant($product_code, $size_id);
?>
<strong class="text-dark mr-3">Màu sắc:</strong>
<form class="ps-1">
    <?php
    $indexColor = 0;
    foreach ($sizes as $value) {
        extract($value);
        $indexColor++;
    ?>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="color<?= $indexColor ?>" name="color" value="<?= $color_id ?>" onclick="chon_btn_color()">
            <label class="custom-control-label" for="color<?= $indexColor ?>" onclick="chon_btn_color()"><?= $color ?></label>
        </div>
    <?php } ?>
</form>