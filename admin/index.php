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
            include "product/addproduct.php";
            break;
        case 'updateproduct':
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
            include "category/addcategory.php";
            break;
        case 'updatecategory':
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
                restorecomments ($comment_id);
            }
            header("Location: index.php?act=recyclecomment");

            break;
        case 'recyclecomment':
            $comments = recyclecomment_all();
            include "comment/recyclecomment.php";
            break;
    }
} else {
    // include "home.php";
}
include "footer.php";
