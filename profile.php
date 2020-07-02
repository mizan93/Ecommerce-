<?php include_once 'inc/header.php' ?>
<?php
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
</style>
<div class="main">
    <div class="content">
        <div class="section group">
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
                            <td width='20%'>N10ame</td>
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
    <?php include_once 'inc/footer.php' ?>