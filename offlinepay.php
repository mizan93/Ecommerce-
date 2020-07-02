<?php include_once 'inc/header.php' ?>
<?php
$login = Session::get('cmrLogin');
if ($login == false) {
    header('Location:login.php');
}
?>
<?php
if (isset($_GET['order_id']) && $_GET['order_id'] == 'order') {
    $cmrId = Session::get('cmrId');
    $insertOrder = $cart->orderProduct($cmrId);
    $deldata = $cart->delCustomerCart();
    header('Location:success.php');
}
?>
<style>
    .division {
        width: 50%;
        float: left;
    }

    .tblone {
        width: 500px;
        margin: 0 auto;
        border: 2px solid #ddd;
    }

    .tblone tr td {
        text-align: justify;
    }

    .tbl2 {
        float: right;
        text-align: left;
        width: 70%;
        border: 2px solid #ddd;
        margin-right: 14px;
        margin-top: 10px;
    }

    .tbl2 tr td {
        text-align: justify;
        padding: 5px;
    }

    .ordernow a {
        width: 200px;
        margin: 15px auto 0;
        background: chocolate;
        color: #fff;
        text-align: center;
        display: block;
        padding: 10px 10px;
        font-size: 30px;
        border-radius: 10px;

    }
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
                <div class="division">
                    <table class="tblone">
                        <tr>
                            <th>NO</th>
                            <th>Product Name</th>

                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>

                        <?php
                        $product = $cart->getCartProduct();
                        if ($product) {
                            $i = 0;
                            $sum = 0;
                            $quantity = 0;
                            while ($data = $product->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $data['productName']; ?></td>
                                    <td>$ <?php echo $data['price']; ?></td>
                                    <td><?php echo $data['quantity']; ?></td>

                                    <td>$ <?php
                                            $total = $data['price'] * $data['quantity'];
                                            echo $total;
                                            ?>
                                    </td>

                                </tr>
                                <?php
                                $quantity = $quantity + $data['quantity'];
                                $sum = $sum + $total;

                                ?>
                        <?php }
                        } else{?>
<h2>Please buy product.</h2>
                        <?php } ?>
                    </table>

                    <table class='tbl2'>
                        <tr>
                            <td>SubTotal($) </td>
                            <td>:</td>
                            <td><?php echo $sum; ?></td>
                        </tr>
                        <tr>
                            <td>Vat </td>
                            <td>:</td>
                            <td>10% $(<?php echo $vat = $sum * 0.1; ?>)</td>
                        </tr>
                        <tr>
                            <td>Grand Total($)</td>
                            <td>:</td>
                            <td><?php
                                $vat = $sum * (10 / 100);
                                $grand_total = $sum + $vat;
                                echo $grand_total;
                                ?></td>
                        </tr>
                        <tr>
                            <td>
                                Quantity </td>
                            <td>:</td>
                            <td><?php echo $quantity; ?></td>
                        </tr>
                    </table>

                </div>
                <div class="division">
                    <?php
                    $id = Session::get('cmrId');
                    $getdata = $customer->getCustomerData($id);
                    if ($getdata) {
                        while ($data = $getdata->fetch_assoc()) {

                    ?>
                            <table class="tblone">
                                <tr>
                                    <td colspan="3">
                                        <h2>
                                            Your profile
                                        </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='20%'>Name</td>
                                    <td width='5%'>:</td>
                                    <td><?php echo $data['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td><?php echo $data['phone']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $data['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?php echo $data['address']; ?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>:</td>
                                    <td><?php echo $data['city']; ?></td>
                                </tr>
                                <tr>
                                    <td>Zip-Code</td>
                                    <td>:</td>
                                    <td><?php echo $data['zipcode']; ?></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>:</td>
                                    <td><?php echo $data['country']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><a href="editprofile.php">Edit profile</a></td>
                                </tr>

                            </table>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
        <div class="ordernow"><a href="?order_id=order">Order Now</a></div>

        <?php include_once 'inc/footer.php' ?>