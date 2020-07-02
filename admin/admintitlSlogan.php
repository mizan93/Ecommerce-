<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$admin = new Admin();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updatedata = $admin->UpdatetittleSlogan($_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <?php 
        if (isset($updatedata)) {
echo $updatedata;
        }
        ?>
        <div class="block sloginblock">
            <?php
            $admin=new Admin();
            $getdata = $admin->adminTitleSlogan();
            if ($getdata) {
                while ($data = $getdata->fetch_assoc()) {

            ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Website logo</label>
                                </td>
                                <td>
                                    <img src="<?php echo $data['image'] ?>" alt="" height="100px" width="200px"><br>
                                    <input name="image" type="file" />
                                </td>
                            </tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $data['tittle'] ?>" name="tittle" class="medium" />
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Website Slogan</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['slogan'] ?>" name="slogan" class="medium" />
                                </td>
                            </tr>


                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php }
            } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>