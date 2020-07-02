<?php include_once 'inc/header.php' ?>
<?php
$login = Session::get('cmrLogin');
if ($login == false) {
    header('Location:login.php');
}
?>
<style>
    .psuccess {
        width: 500px;
        min-height: 200px;
        text-align: center;
        border: 1px solid #ddd;
        margin: 0 auto;
        padding: 50px;
    }

    .psuccess h2 {
        border-bottom: 1px solid #ddd;
        margin-bottom: 40px;
        padding-bottom: 10px;
    }

    .psuccess p {
        line-height: 25px;
        color: green;
        text-align: left;

    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="psuccess">
                <h2>Success</h2>
                <?php
                $cmrId = Session::get('cmrId');
                $amount = $cart->payableAmount($cmrId);
                if ($amount) {
                    $sum = 0;
                    while ($data = $amount->fetch_assoc()) {
                        $price = $data['price'];
                        $sum = $sum + $price;
                      
                    }}
                ?>
                
                        <p>Total payable amount(incuded vat) : $
                    <?php

                        $vat = $sum * 0.1;
                        $total = $sum + $vat;
                        echo $total;
                   ?></p>
                        <p>Thank you for purchase our product.</p>
                        <p>We will contact you soon with details...<a href="orderdetails.php">Visit here to see details.</a> </p>
               
            </div>

        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>