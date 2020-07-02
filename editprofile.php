<?php include_once 'inc/header.php' ?>
<?php
$admin = new Admin();

$login = Session::get('cmrLogin');
if ($login == false) {
    header('Location:login.php');
}
?>
<style>
    .tblone {
        width: 550px;
        margin: 0 auto;
        border: 2px solid #ddd;
    }

    .tblone tr td {
        text-align: justify;
    }

    .tblone input[type='text'] {
        padding: 5px;
        width: 400px;
        font-size: 15px;
    }
</style>
<?php
$cmrId = Session::get('cmrId');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $customerupdate = $customer->CustomerUpdate($_POST,$cmrId);
}
?>
<div class="main">
    <div class="content">
        <div class="section group">
            <?php
            $id = Session::get('cmrId');
            $getdata = $customer->getCustomerData($id);
            if ($getdata) {
                while ($data = $getdata->fetch_assoc()) {

            ?>
                    <form action="" method="post">
                        <table class="tblone">
                            <tr>
                                <td colspan="3">
                                    <h2>
                                        Edit profile
                                    </h2>
                                    <?php 
                                    if (isset($customerupdate)) {
                                       echo $customerupdate;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td width='20%'>Name</td>
                                <td><input type="text" name="username" value="<?php echo $data['username']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input type="text" name="phone" value="<?php echo $data['phone']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" value="<?php echo $data['email']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="text" name="address" value="<?php echo $data['address']; ?>"></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input type="text" name="city" value="<?php echo $data['city']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Zip-Code</td>
                                <td><input type="text" name="zipcode" value="<?php echo $data['zipcode']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td><input type="text" name="country" value="<?php echo $data['country']; ?>"></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="edit" value="Save">
                                </td>
                            </tr>

                        </table>
                    </form>
            <?php }
            } ?>

        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>