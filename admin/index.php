<?php
ob_start();
include "../global.php";
include "../model/pdo.php";
include "../model/category.php";
include "../model/product.php";
include "../model/account.php";
include "../model/comment.php";
include "header.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'admin':
            include "index.php";
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
            if (isset($_POST['add_product'])) {
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $category_id = $_POST['category_id'];
                $product_image = basename($_FILES['product_image']['name']);
                $path = "../image/" . $product_image;
                $temp = $_FILES['product_image']['tmp_name'];
                move_uploaded_file($temp, $path);
                insert_product($product_name, $product_image, $price, $description, $category_id);
            }
            include "product/addproduct.php";
            break;
        case 'updateproduct':
            $listcategory = listCategories();
            $product_id = $_GET['product_id'];
            $product = product_one($product_id);
            if  (isset($_POST['update_product'])) {
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
    }
} else {
    include "home.php";
}
include "footer.php";
