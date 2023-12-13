<?php
ob_start();
include "../global.php";
include "../model/pdo.php";
include "../model/category.php";
include "../model/product.php";
include "../model/account.php";
include "../model/order.php";
include "../model/variant.php";
include "../model/chart.php";
include "../model/comment.php";
include "header.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'admin':
            $count_tonkho = count_variant_quantity();
            $count_product  = count_product_all();
            $count_users = count_users();
            $tongdoanhthu = tongdoanhthu();
            $productsale = load_product_sale();
            $tiledon = tiledon();
            $thongkedoanhthu = thongkedoanhthu();
            $thongkesanpham = load_thongke_sanpham_danhmuc();
            $countorder = countorders();
            include "chart/chart.php";
            break;
        case 'listproduct':
            if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
                $keyword = $_POST['keyword'];
            } else {
                $keyword = "";
            }
            if (isset($_POST['category_id']) && ($_POST['category_id'] > 0)) {
                $category_id = $_POST['category_id'];
            } else {
                $category_id = 0;
            }
            $listCategories = listCategories();
            $listProduct = listProduct_admin($category_id, $keyword);
            include "product/listproduct.php";
            break;
        case 'addproduct':
            $listcategory = listCategories();
            $listColor = loadall_color();
            $listSize = loadall_size();
            if (isset($_POST['add_product'])) {
                $product_name = $_POST['product_name'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $category_id = $_POST['category_id'];
                $product_code = date('Ymdhis') . $category_id;
                $price = $_POST['price'];
                $description = $_POST['description'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $product_image = basename($_FILES['product_image']['name']);
                $path = "../image/" . $product_image;
                $temp = $_FILES['product_image']['tmp_name'];
                move_uploaded_file($temp, $path);
                insert_product($product_name, $product_code, $product_image, $price, $description, $category_id);
                foreach ($listColor as $color) {
                    foreach ($listSize as $size) {
                        addvariant($product_code, $color[0], $size[0]);
                    }
                }
            }
            include "product/addproduct.php";
            break;
        case 'updateproduct':
            $listcategory = listCategories();
            $product_id = $_GET['product_id'];
            $product = product_one($product_id);
            if (isset($_POST['update_product'])) {
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $category_id = $_POST['category_id'];
                if (isset($_FILES['product_image']['name']) && $_FILES['product_image']['name'] != "") {
                    $product_image = basename($_FILES['product_image']['name']);
                    $path = "../image/" . $product_image;
                    $temp = $_FILES['product_image']['tmp_name'];
                    move_uploaded_file($temp, $path);
                } else {
                    $product_image = $product['product_image'];
                }
                update_product($product_id, $product_name, $product_image, $price, $description, $category_id);
                header("location: index.php?act=listproduct");
            }
            include "product/updateproduct.php";
            break;
        case 'deleteproduct':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
                delete_mem_product($product_id);
            }
            header("Location: index.php?act=listproduct");
            break;
        case 'restoreproduct':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
                restore_product($product_id);
            }
            header("Location: index.php?act=recycleproduct");
            break;
        case 'recycleproduct':
            if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
                $keyword = $_POST['keyword'];
            } else {
                $keyword = "";
            }
            if (isset($_POST['category_id']) && ($_POST['category_id'] > 0)) {
                $category_id = $_POST['category_id'];
            } else {
                $category_id = 0;
            }
            $listCategories = listCategories();
            $listProduct = listProduct_recycle_admin($category_id, $keyword);
            include "product/recycleproduct.php";
            break;
        case 'listcategory':
            $listCategories = listCategories();
            include "category/listcategory.php";
            break;
        case 'addcategory':
            if (isset($_POST['add_category'])) {
                $category_name = $_POST['category_name'];
                $category_image = basename($_FILES['category_image']['name']);
                $path = "../image/categories/" . $category_image;
                $temp = $_FILES['category_image']['tmp_name'];
                move_uploaded_file($temp, $path);
                add_category($category_name, $category_image);
            }
            include "category/addcategory.php";
            break;
        case 'updatecategory':
            $category_id = $_GET['category_id'];
            $category = load_category($category_id);
            if (isset($_POST['update_category'])) {
                $category_name = $_POST['category_name'];
                if (isset($_FILES['category_image']['name']) && $_FILES['category_image']['name'] != "") {
                    $category_image = basename($_FILES['category_image']['name']);
                    $path = "../image/categories/" . $category_image;
                    $temp = $_FILES['category_image']['tmp_name'];
                    move_uploaded_file($temp, $path);
                } else {
                    $category_image = $category['category_image'];
                }
                update_category($category_id, $category_name, $category_image);
            }
            include "category/updatecategory.php";
            break;
        case 'recyclecategory':
            include "category/recyclecategory.php";
            break;
        case 'listaccount':
            $accounts = account_all();
            if (isset($_POST['capquyen'])) {
                $user_id = $_GET['user_id'];
                capquyen($user_id);
                header("Location: index.php?act=listaccount");
            }
            if (isset($_POST['haquyen'])) {
                $user_id = $_GET['user_id'];
                haquyen($user_id);
                header("Location: index.php?act=listaccount");
            }
            include "account/listaccount.php";
            break;
        case 'listcomment':
            $comments = comment_all();
            include "comment/listcomment.php";
            break;
        case 'deletecomment':
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                $comment_id = $_GET['comment_id'];
                deletecomments($comment_id);
            }
            header("Location: index.php?act=listcomment");
            break;
        case 'harddeletecomment':
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                $comment_id = $_GET['comment_id'];
                hard_delete_comment($comment_id);
            }
            header("Location: index.php?act=recyclecomment");
            break;

        case 'restorecomment':
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                $comment_id = $_GET['comment_id'];
                restorecomments($comment_id);
            }
            header("Location: index.php?act=recyclecomment");

            break;
        case 'recyclecomment':
            $comments = recyclecomment_all();
            include "comment/recyclecomment.php";
            break;
        case 'listorders':
            $orders = loadall_order();
            if (isset($_POST['chapnhandonhang'])) {
                $order_name = $_GET['order_name'];
                acceptorder($order_name);
                $order = load_order($order_name);
                foreach ($order as $value) {
                    extract($value);
                    if ($order_role == 1) {
                        minus_quantity_variants($variant_id, $quantity);
                    }
                }
                header("Location: index.php?act=listorders");
            }
            if (isset($_POST['huydonhang'])) {
                $order_name = $_GET['order_name'];
                $order = load_order($order_name);
                foreach ($order as $value) {
                    extract($value);
                    if ($order_role == 1) {
                        plus_quantity_variants($variant_id, $quantity);
                    }
                }
                cancelorder($order_name);
                header("Location: index.php?act=listorders");
            }
            include "oders/listoder.php";
            break;
        case 'detailorder':
            $order_name = $_GET['order_name'];
            $listproduct = load_detailorder($order_name);
            include "oders/detailorder.php";
            break;
        case 'listvariant':
            $product_code = $_GET['product_code'];
            $variant = load_variant_product($product_code);
            if (isset($_POST['updatevariant'])) {
                $product_code = $_GET['product_code'];
                $variant_id = $_GET['variant_id'];
                $quantity = $_POST['quantity'];
                updatevariant($variant_id, $quantity);
                header("Location: index.php?act=listvariant&product_code=" . $product_code);
            }
            include "variant/variant.php";
            break;
        case 'updatevariant':
    }
} else {
    header("Location: index.php?act=admin");
}
include "footer.php";
