<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
$admin = new Admin();
if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $role=$_GET['role'];
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
$updatadmn=$admin->UpdateAdmin($id,$role,$_POST);
}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Profile</h2>
        <?php
         if(isset($updatadmn))
        echo $updatadmn; 
        ?>
        <div class="block">
            <?php
            

            $getadmn = $admin->adminByIdnRole($id, $role);
            if ($getadmn) {
                while ($value = $getadmn->fetch_assoc()) {

            ?>
            
<form action="" method="post"></form>
                    <table class="form">
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type=" text" name="name" value=" <?php echo $value['name']; ?>" class="medium" />
                            </td>

                        </tr>
                       
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value=" <?php echo $value['email'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
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