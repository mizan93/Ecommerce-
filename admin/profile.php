<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$admin = new Admin();

if (isset($_GET['ok'])) {
    header('Location:dasboard.php');
}
?>
<?php
$adminId = Session::get('adminId');
$adminRole = Session::get('adminRole');
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Profile</h2>
        <div class="block">


            <table class="form">

                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php
                $admin = new Admin();
                $getproduct = $admin->adminByIdnRole($adminRole, $adminId);
                if ($getproduct) {
                    while ($value = $getproduct->fetch_assoc()) {

                ?>
                        <tr>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['username']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><a href="adminedit.php?id=<?php echo $value['id']; ?>&role=<?php echo $value['level']; ?>">Edit</a></td>
                        </tr>

                <?php }
                } ?>

            </table>


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