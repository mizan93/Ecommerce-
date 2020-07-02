<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$admin=new Admin();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updatedata = $admin->UpdateCompanyInfo($_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Company location</h2>
        <?php
        if (isset($updatedata)) {
            echo $updatedata;
        }
        ?>
        <div class="block sloginblock">
            <?php

            $getdata = $admin->getAllcompanyInfo();
            if ($getdata) {
                while ($data = $getdata->fetch_assoc()) {

            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Address</label>
                                </td>
                                <td>
                                    <textarea name="address" id="" cols="30" rows="10" class="tinymce">
                                        <?php echo $data['address'] ?>
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Phone</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['phone'] ?>" name="phone" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Fax</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['fax'] ?>" name="fax" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['email'] ?>" name="email" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Facebook</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['fb'] ?>" name="fb" class="medium" />
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <label>Twitter</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['tw'] ?>" name="tw" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Google+</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['glplus'] ?>" name="glplus" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Linkedin</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $data['linkdin'] ?>" name="linkdin" class="medium" />
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>