<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
if (!isset($_GET['brandid']) && $_GET['brandid'] == null) {
    echo "<script>window.location = 'brandlist.php'; </script>";
    // header('Location: catlist.php');
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
}
?>
<?php
$brand = new Brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $brandname = $_POST['brandName'];
    $updatebrand = $brand->brandUpdate($brandname, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Brand</h2>
        <div class="block copyblock">
            <?php
            if (isset($updatebrand)) {
                echo $updatebrand;
            }
            ?>
            <?php
            $getbrand = $brand->getbrandByid($id);
            if ($getbrand) {
                while ($data = $getbrand->fetch_assoc()) {

            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input name="brandName" type="text" value="<?php echo $data['brandName']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
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