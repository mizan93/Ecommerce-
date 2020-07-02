<?php include_once 'inc/header.php' ?>
<?php
$login = Session::get('cmrLogin');
if ($login == false) {
    header('Location:login.php');
}
?>
<style>
    .payment {
        width: 500px;
        min-height: 200px;
        text-align: center;
        border: 1px solid #ddd;
        margin: 0 auto;
        padding: 50px;
    }

    .payment h2 {
        border-bottom: 1px solid #ddd;
        margin-bottom: 40px;
        padding-bottom: 10px;
    }

    .payment a {
        background: #ff0000 none repeat scroll 0 0;
        border-radius: 3px;
        color: #fff;
        font-size: 25px;
        padding: 5px 30px;
    }

    .previous {
        background-color: #414045;
        color: white;
        padding: 5px 15px;
        margin-top: 10px;
       
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
                <h2>Choose Payment option</h2>
                <a href="offlinepay.php">Offline payment</a>
                <a href="onlinepay.php">Online payment</a>

            </div>
            <div class="back">
                <a href="cart.php" class="previous">&laquo; Previous</a>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>