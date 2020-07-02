<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <?php
        $admin=new Admin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $updatedata = $admin->UpdateClienttittleSlogan($_FILES);
        }
        if (isset($updatedata)) {
            echo $updatedata;
        }
        ?>
        <div class="block sloginblock">
            <?php
            $getdata = $admin->TitleSlogan();
            if ($data = $getdata->fetch_assoc()) {
            ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Website logo</label>
                            </td>
                            <td>
                                <img src="<?php echo $data['image']; ?>" alt="" height="100px" width="200px"><br>
                                <input name="image" type="file" />
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
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>