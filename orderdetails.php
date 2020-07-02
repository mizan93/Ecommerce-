<?php include_once 'inc/header.php' ?>
<style>
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
</style>
<?php
$login = Session::get('cmrLogin');
if ($login == false) {
    header('Location:login.php');
}
?>
<?php
if (isset($_GET['cust_id'])) {
    $cust_id = $_GET['cust_id'];
    $price = $_GET['price'];
    $datetime = $_GET['datetime'];
    $confirm = $cart->productConfirm($cust_id, $price, $datetime);
} ?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="order">
                <h2>Your Order Details</h2>
                <?php
                if (isset($confirm)) {
                    echo $confirm;
                }
                ?>
                <table class="tblone">
                    <tr>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th> Price</th>
                        <th> Data</th>
                        <th>Status</th>

                        <th>Action</th>
                    </tr>

                    <?php
                    $cmrId = Session::get('cmrId');
                    $product = $cart->getOrderedProduct($cmrId);
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
                                <td><img src="admin/<?php echo $data['image']; ?>"></td>
                                <td><?php echo $data['quantity']; ?></td>
                                <td>$
                                    <?php
                                    $total = $data['price'];
                                    echo $total;
                                    ?>
                                </td>
                                <td><?php echo $fm->formatDate($data['datetime']); ?></td>
                                <td><?php
                                    if ($data['status'] == 0) {
                                        echo 'Pending';
                                    } elseif ($data['status'] == 1) {
                                        echo 'Shifted';
                                    } else {
                                        echo 'Ok';
                                    }
                                    ?></td>
                                <?php
                                if ($data['status'] == 1) { ?>
                                    <td><a onclick="return confirm('Are you sure to confirm?? ');" href="?cust_id=<?php echo $data['cmrId']; ?>&
									price=<?php echo $data['price']; ?>&datetime=<?php echo $data['datetime']; ?>">Confirm</a></td>

                                <?php } elseif ($data['status'] == 2) { ?>
                                    <td>OK</td>
                                <?php }elseif ($data['status'] == 0) {?>
                                <td>N/A</td>
                                <?php } ?>
                            </tr>
                            <?php
                            $quantity = $quantity + $data['quantity'];
                            $sum = $sum + $total;
                            ?>
                        <?php }
                    } else { ?>
                        <p>Thanks you for parchase our product.</p>
                    <?php } ?>
                    <?php
                    if (!empty($sum) && !empty($quantity)) {

                    ?>
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
                            $vat = $sum * 0.1;
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
            <?php } else {
                    } ?>
            <h4>You will get product soon.</h4>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>