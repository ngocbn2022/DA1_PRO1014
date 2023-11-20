<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Group 9</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    include "../model/pdo.php";
    include "../model/comment.php";
    $product_id = $_SESSION['product_id'];
    $comments = comments($product_id);
    ?>
    <div class="media mb-4 ps-2 pt-2">
        <?php foreach ($comments as $comment) {
            extract($comment);
        ?>
            <div class="media-body">
                <h6><?= $username ?><small> - <i><?= $time ?></i></small></h6>
                <div class="text-warning mb-2">
                    <?php if ($star == 1) { ?>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                    <?php } else if ($star== 2) { ?>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                    <?php } else if ($star == 3) { ?>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                    <?php } else if ($star == 4) { ?>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="far fa-star text-warning mr-1"></small>
                    <?php } else { ?>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                        <small class="fa fa-star text-warning mr-1"></small>
                    <?php } ?>
                </div>
                <p><?= $content ?></p>
            </div>
        <?php } ?>
    </div>

</body>

</html>