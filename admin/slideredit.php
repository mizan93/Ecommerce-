<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$admin = new Admin();

if (isset($_GET['editslid_id']) && $_GET['editslid_id'] != null) {

    $edit_id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['editslid_id']);
}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Slider</h2>
        <div class="block">
            <?php
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $editslider = $admin->UpdateSlider($_POST, $_FILES, $edit_id);
            }
            if (isset($editslider)) {
                echo $editslider;
            }

            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <?php
                $getslider = $admin->GetSliderByID($edit_id);
                if ($getslider) {

                    while ($data = $getslider->fetch_assoc()) {

                ?>
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Title</label>
                                </td>
                                <td>
                                    <input type="text" name="title" value="<?php echo $data['title']; ?>" class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td><img src="<?php echo $data['image']; ?>" height="100px" width="150px" />
                                    <br>
                                    <input type="file" name="image" />
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
                                </td>
                            </tr>
                        </table><?php }
                        } ?>
            </form>


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