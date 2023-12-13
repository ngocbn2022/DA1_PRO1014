<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fpoly</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<?php
if (isset($_SESSION['user_id'])) {
    if (count_cart($_SESSION['user_id']) != false) {
        $count_cart = count_cart($_SESSION['user_id']);
    } else {
        $count_cart = 0;
    }
} else {
    $count_cart = 0;
}
?>

<body>
    <!-- Topbar Start -->
    <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center bg-light py-2 px-xl-5 d-none d-lg-flex">
                <div class="col-lg-3">
                    <a href="index.php?act=home" class="text-decoration-none">
                        <span class="h1 text-uppercase text-orange px-2 ml-n1">Fpoly</span>
                    </a>
                </div>
                <div class="col-lg-6 col-6 text-left">
                    <form action="index.php?act=product" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm tại đây">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-6 text-right d-flex justify-content-end">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-phone"></i>
                        <h6 class="m-0 ms-1">+8412345678</h6>
                    </div>
                    <div class="d-flex align-items-center ps-4">
                        <i class="fa-solid fa-envelope"></i>
                        <h6 class="m-0 ms-1">clothing@gmail.com</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <div class="container-fluid bg-info mb-30">
            <div class="row px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a class="btn d-flex align-items-center justify-content-between bg-warning w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                        <h6 class="text-dark m-0"><i class="fa fa-bars mr-2 pe-2"></i>Danh mục</h6>
                        <i class="fa fa-angle-down text-dark"></i>
                    </a>
                    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                        <div class="navbar-nav w-100">
                            <?php foreach ($listCategories as $category) {
                                extract($category); ?>
                                <a href="index.php?act=product&category_id=<?= $category_id ?>" class="nav-item nav-link menu-second"><?= $category_name ?></a>
                            <?php } ?>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9 ms-0">
                    <nav class="navbar navbar-expand-lg bg-info navbar-dark py-3 py-lg-0 px-0">
                        <a href="index.php?act=home" class="text-decoration-none d-block d-lg-none">
                            <span class="h1 text-uppercase text-orange px-2 ml-n1">Fpoly</span>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php?act=home" class="nav-item nav-link">Trang chủ</a>
                                <a href="index.php?act=product&page=1" class="nav-item nav-link">Sản phẩm</a>
                            </div>
                            <ul class="navbar-nav ml-auto py-0 d-flex">
                                <li class="btn flex cartlike px-0 pe-3 user-menu">
                                    <?php if (isset($_SESSION['user_name'])) { ?>
                                        <span class="badge navbar-badge rounded-circle align-items-center ps-0 py-3" style="margin: auto;">Xin chào, <?= $_SESSION['user_name']; ?></span>
                                        <ul class="user-menuSecond">
                                            <li>
                                                <a href="index.php?act=info" class="btn flex px-0 login-text">
                                                    <span class="badge navbar-badge  rounded-circle align-items-center justify-content-center" style="margin: auto;">Tài khoản</span>
                                                </a>
                                            </li>
                                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) { ?>
                                                <li>
                                                    <a href="index.php?act=admin" class="btn flex px-0 login-text">
                                                        <span class="badge navbar-badge  rounded-circle align-items-center justify-content-center" style="margin: auto;">Admin</span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                            <li>
                                                <a href="index.php?act=logout" class="btn flex px-0 login-text">
                                                    <span class="badge navbar-badge rounded-circle align-items-center justify-content-center" style="margin: auto;">Đăng xuất</span>
                                                </a>
                                            </li>
                                        </ul>
                                    <?php } else { ?>
                                        <i class="fa-solid fa-user"></i>
                                        <span class="badge navbar-badge  rounded-circle align-items-center ps-0 py-3" style="margin: auto;">Tài khoản</span>
                                        <ul class="user-menuSecond">
                                            <li>
                                                <a href="index.php?act=login" class="btn flex px-0 login-text">
                                                    <span class="badge navbar-badge  rounded-circle align-items-center justify-content-center" style="margin: auto;">Đăng nhập</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php?act=register" class="btn flex px-0 login-text">
                                                    <span class="badge navbar-badge rounded-circle align-items-center justify-content-center" style="margin: auto;">Đăng ký</span>
                                                </a>

                                            </li>
                                        </ul>
                                    <?php } ?>
                                </li>
                                <li class="cartlike user-menu">
                                    <a href="index.php?act=cart" class="btn cartlike px-0 ml-3">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span class="badge navbar-badge rounded-circle ps-0 py-3 login-text" style="margin: auto;">Giỏ hàng (<?php if ($count_cart == 0) {
                                                                                                                                                    echo $count_cart;
                                                                                                                                                } else {
                                                                                                                                                    echo $count_cart['count'];
                                                                                                                                                } ?>)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>