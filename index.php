<?php
include './classes/application.php';
$obj_app = new Application();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | E-Shopper</title>
        <link href="./assets/front_end_assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/front_end_assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="./assets/front_end_assets/css/prettyPhoto.css" rel="stylesheet">
        <link href="./assets/front_end_assets/css/price-range.css" rel="stylesheet">
        <link href="./assets/front_end_assets/css/animate.css" rel="stylesheet">
        <link href="./assets/front_end_assets/css/main.css" rel="stylesheet">
        <link href="./assets/front_end_assets/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="assets/front_end_assets/js/html5shiv.js"></script>
        <script src="assets/front_end_assets/js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="assets/front_end_assets/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/front_end_assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/front_end_assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/front_end_assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="./assets/front_end_assets/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <!--/ start header_top-->
            <?php include './include/header_top.php'; ?>
            <!--/end header_top-->
            <!--/ start header-middle-->
            <?php include './include/header_middle.php'; ?>
            <!--/end header-middle-->

            <!--/ start header-bottom-->
            <?php include './include/header_bottom.php'; ?>
            <!--/ end header-bottom-->
        </header><!--/header-->
        <!-- content-->
        <?php
        if (isset($pages)) {
            if ($pages == 'shop') {
                include './pages/shop_content.php';
            } elseif ($pages == 'product_detail') {
                include './pages/product_detail_content.php';
            } elseif ($pages == 'checkout') {
                include './pages/checkout_content.php';
            } elseif ($pages == 'cart') {
                include './pages/cart_content.php';
            } elseif ($pages == 'login') {
                include './pages/login_content.php';
            } elseif ($pages == 'blog') {
                include './pages/blog_content.php';
            } elseif ($pages == 'blog_single') {
                include './pages/blog_single_content.php';
            } elseif ($pages == '404') {
                include './pages/404_content.php';
            } elseif ($pages == 'contact_us') {
                include './pages/contact_us_content.php';
            } elseif ($pages=='category') {
                include './pages/category_content.php';    
            }elseif ($pages=='product_detail') {
                include './pages/product_detail_content.php';
            }
        } else {
            include './pages/home_content.php';
        }
        ?>
        <footer id="footer"><!--Footer-->
            <!--Start footer top -->
            <?php include './include/footer_top.php'; ?>
            <!--end footer top -->
            <!--start footer middle -->
            <?php include './include/footer_middle.php'; ?>
            <!--end footer middle -->
            <!--Start footer bottom -->
            <?php include './include/footer_bottom.php'; ?>
            <!--end footer bottom -->
        </footer><!--/Footer-->

        <script src="./assets/front_end_assets/js/jquery.js"></script>
        <script src="./assets/front_end_assets/js/bootstrap.min.js"></script>
        <script src="./assets/front_end_assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/front_end_assets/js/price-range.js"></script>
        <script src="./assets/front_end_assets/js/jquery.prettyPhoto.js"></script>
        <script src="./assets/front_end_assets/js/main.js"></script>
    </body>
</html>