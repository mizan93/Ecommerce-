<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<style>
    .tblone {
        width: 550px;
        margin: 0 auto;
        border: 2px solid #ddd;
    }

    .tblone tr td {
        text-align: justify;
    }
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Customer Address</h2>
        <div class="block">
            <?php
$admin = new Admin();

            if (!isset($_GET['cus_id']) && $_GET['cus_id'] == null) {
                echo "<script>window.location = 'inbox.php'; </script>";
                //header('Location: 404.php');
            } else {
                $cust_id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['cus_id']);
               
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo "<script>window.location = 'inbox.php'; </script>";
            }

            ?><?php
                $getdata = $customer->getCustomerAddress($cust_id);
                if ($getdata) {
                    while ($data = $getdata->fetch_assoc()) {

                ?>
            <form action="" method="post">
                <table class="tblone">

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
                        <td><input type="submit" name='ok' value="OK"></td>
                    </tr>

                </table>
            </form>
    <?php }
                } ?>
    <table>
        <?php
        $getimage = $cart->getImage($cust_id);
        if ($data = $getimage->fetch_assoc()) {
           
        ?>
                <tr>
                    <td>poduct photo</td>
                    <td>:</td>
                    <td><img src="<?php echo $data['image']; ?>" alt=""></td>
                </tr>
        <?php }
         ?>
    </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>