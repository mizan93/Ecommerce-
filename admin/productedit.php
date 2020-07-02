<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
 
<?php
if (!isset($_GET['product_id']) && $_GET['product_id'] == null) {
    echo "<script>window.location = 'productlist.php'; </script>";
    // header('Location: catlist.php');
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['product_id']);
}
?>
<?php
$product = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $updateproduct = $product->productUpdate($_POST, $_FILES, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <?php
        if (isset($updateproduct)) {
            echo $updateproduct;
        }

        ?>

        <div class="block">
            <?php
            $getproduct = $product->getProductById($id);
            if ($getproduct) {
                while ($value = $getproduct->fetch_assoc()) {

            ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" name="productName" value=" <?php echo $value['productName']; ?>" class="medium" />
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <label>Category</label>
                                </td>
                                <td>
                                    <select id="select" name="catId">
                                        <option value="0">Select Category</option>
                                        <?php
                                        $cat = new Category();
                                        $getcat = $cat->getallCategory();
                                        if ($getcat) {
                                            while ($data = $getcat->fetch_assoc()) {

                                        ?>
                                                <option <?php if ($value['catId'] == $data['catId']) { ?> selected="selected" ; <?php } ?> value="<?php echo $data['catId']; ?>">
                                                    <?php echo $data['catName']; ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Brand</label>
                                </td>
                                <td>
                                    <select id="select" name="brandId">
                                        <option value="-1">Select Brand</option>
                                        <?php
                                        $brand = new Brand();
                                        $getbrand = $brand->getallBrand();
                                        if ($getbrand) {
                                            while ($data = $getbrand->fetch_assoc()) {

                                        ?>
                                                <option <?php
                                                        if ($value['brandId'] == $data['brandId']) { ?> selected="selected" ; <?php } ?> value="<?php echo $data['brandId']; ?>">
                                                    <?php echo $data['brandName']; ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Description</label>
                                </td>
                                <td>
                                    <textarea name="body" type="text" class="tinymce">
                                    <?php echo $value['body']; ?>
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Price</label>
                                </td>
                                <td>
                                    <input type="text" name="price" value=" <?php echo $value['price'] ?>" class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src=" <?php echo $value['image'] ?>" alt="" height="100px" width="200px"><br>
                                    <input name="image" type="file" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Product Type</label>
                                </td>
                                <td>
                                    <select id="select" name="type">
                                        <option>Select Type</option>
                                        <?php if ($value['type'] == 0) { ?>
                                            <option selected="selected" value="0">Featured</option>
                                            <option value="1">General</option>
                                        <?php } else { ?>
                                            <option selected="selected" value="1">General</option>
                                            <option value="0">Featured</option>
                                        <?php }  ?>

                                    </select>
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