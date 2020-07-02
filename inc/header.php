<?php
include 'lib/session.php';
Session::init();
include 'lib/database.php';
include 'helper/format.php';

spl_autoload_register(function ($class) {
    include_once 'classes/' . $class . '.php';
});

$db = new Database();
$fm = new Format();
$product = new Product();
$cart = new Cart();
$category = new Category();
$brand = new Brand();
$customer = new Customer();
$admin = new Admin();
?>

<?php
//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

//or, if you DO want a file to cache, use:
header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

?>


<!DOCTYPE HTML>

<head>
    <title>
        <?php
        if (isset($_GET['pro_id'])) {
            $productId = $_GET['pro_id'];
            $getdata = $product->getTitle($productId);
            if ($getdata) {
                while ($data = $getdata->fetch_assoc()) { ?>
                    <?php echo $data['productName']; ?>-<?php echo TITLE; ?>
                <?php }
            }
        } elseif (isset($_GET['getcat_id'])) {
            $catId = $_GET['getcat_id'];
            $getdata = $category->getTitle($catId);
            if ($getdata) {
                while ($data = $getdata->fetch_assoc()) { ?>
                    <?php echo $data['catName']; ?>-<?php echo TITLE; ?>
                <?php }
            }
        } elseif (isset($_GET['getbrand_id'])) {
            $getbrand_id = $_GET['getbrand_id'];
            $getdata = $brand->getTitle($getbrand_id);
            if ($getdata) {
                while ($data = $getdata->fetch_assoc()) { ?>
                    <?php echo $data['brandName']; ?>-<?php echo TITLE; ?>
            <?php }
            }
        } else { ?>
            <?php echo $fm->title(); ?>-<?php echo TITLE; ?>
        <?php } ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    if (isset($_GET['pro_id'])) {
        $keyword = $_GET['pro_id'];
        $keywords = $product->getMeteaKeywords($keyword);
        if ($keywords) {
            while ($result = $keywords->fetch_assoc()) { ?>
                <meta name="keywords" content="<?php echo $result['productName']; ?>">

        <?php }
        }
    } else { ?>
        <meta name="keywords" content="<?php echo KEYWORDS; ?>">

    <?php } ?>

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

</head>

<body>
    <div class="wrap">
        <div class="header_top">
            <?php
            $getdata = $admin->TitleSlogan();
            if ($data = $getdata->fetch_assoc()) {
            ?>
                <div class="logo">
                    <a href="index.php"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
                </div>
            <?php } ?>
            <div class="header_top_right">
                <div class="search_box">
                    <form action="search.php" method="get">
                        <input type="text" name="search" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}">
                        <input type="submit" value="SEARCH">
                    </form>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="#" title="View my shopping cart" rel="nofollow">
                            <span class="cart_title">Cart</span>
                            <span class="no_product">

                                <?php
                                $getdata = $cart->checkCartproduct();
                                if ($getdata) {
                                    $sum = Session::get('sum');
                                    $qn = Session::get('quantity');
                                    echo "$" . $sum . " | Q-" . $qn;
                                } else {
                                    echo "(Empty)";
                                }

                                ?>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="login">
                    <?php
                    $login = Session::get('cmrLogin');
                    if ($login == false) { ?>
                        <a href="login.php">Login</a>
                    <?php } else { ?>
                        <a href="?cid=<?php Session::get('cmrId'); ?>">Logout</a>
                    <?php } ?>
                    <?php
                    if (isset($_GET['cid'])) {
                        $cmrId = Session::get('cmrId');

                        $deldata = $cart->delCustomerCart();
                        $deldata = $product->delCustomerCompareData($cmrId);
                        $deldata = $product->delCustomerWishlistData($cmrId);
                        Session::destroy();
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <style>
            #active {
                background: #6D369A;
            }
        </style>
        <div class="menu">

            <?php
            $path = $_SERVER['SCRIPT_FILENAME'];
            $currenpage = basename($path, '.php');

            ?>

            <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                <li <?php if ($currenpage == 'index') {
                        echo 'id="dc_mega-menu-orange"';
                    } ?>><a href="index.php">Home</a></li>

                <li><a <?php if ($currenpage == 'topbrands') {
                            echo 'id="active"';
                        } ?> href="topbrands.php">Top Brands</a></li>

                <?php
                $login = $login = Session::get('cmrLogin');
                if ($login) {
                ?>
                    <?php
                    $checkCart = $cart->checkCartproduct();
                    if ($checkCart) { ?>
                        <li><a <?php if ($currenpage == 'cart') {
                                    echo 'id="active"';
                                } ?> href="cart.php">Cart</a></li>
                        <li><a <?php if ($currenpage == 'payment') {
                                    echo 'id="active"';
                                } ?> href="payment.php">Payment</a></li>
                    <?php } ?>
                    <?php
                    $cmrId = Session::get('cmrId');
                    $checkordert = $cart->checkOrder($cmrId);
                    if ($checkordert) { ?>
                        <li><a <?php if ($currenpage == 'orderdetails') {
                                    echo 'id="active"';
                                } ?> href="orderdetails.php">Order Details</a></li>
                    <?php } ?>
                    <?php $login = Session::get('cmrLogin');
                    if ($login) { ?>
                        <li><a <?php if ($currenpage == 'profile') {
                                    echo 'id="active"';
                                } ?> href="profile.php">Profile</a> </li>
                    <?php } ?>
                    <?php
                    $cmrId = Session::get('cmrId');
                    $getproduct = $product->getProductToCompare($cmrId);
                    if ($getproduct) { ?>
                        <li><a <?php if ($currenpage == 'compare') {
                                    echo 'id="active"';
                                } ?> href="compare.php">Compare</a> </li>
                    <?php } ?>
                    <?php $cmrId = Session::get('cmrId');
                    $getproduct = $product->getProductToWishlist($cmrId);
                    if ($getproduct) { ?>
                        <li><a <?php if ($currenpage == 'wishlist') {
                                    echo 'id="active"';
                                } ?> href="wishlist.php">Wishlist</a> </li>
                    <?php } ?>
                <?php } ?>
                <li><a <?php if ($currenpage == 'contact') {
                            echo 'id="active"';
                        } ?> href="contact.php">Contact</a> </li>
                <div class="clear"></div>
            </ul>
        </div>