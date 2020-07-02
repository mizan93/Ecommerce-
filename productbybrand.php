<?php include_once 'inc/header.php' ?>
<?php
if (!isset($_GET['getbrand_id']) && $_GET['getbrand_id'] == null) {
    echo "<script>window.location = '404.php'; </script>";
    //header('Location: 404.php');
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['getbrand_id']);
}

$getdata = $product->getProductBYbrandId($id);
$getbrandname = $product->getbrandName($id);

?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <?php if ($data = $getbrandname->fetch_assoc()) {

                ?>
                    <h3>Latest from <?php echo $data['brandName']; ?></h3>
                <?php }
                ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            if ($getdata) {
                while ($data = $getdata->fetch_assoc()) {

            ?>

                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?pro_id=<?php echo $data['productId']; ?>"><img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
                        <h2><?php echo $data['productName']; ?> </h2>
                        <p><?php echo $fm->textShorten($data['body'], 20); ?></p>
                        <p><span class="price">$<?php echo $data['price']; ?> </span></p>
                        <div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>" class="details">Details</a></span></div>
                    </div>
            <?php }
            } else {
                echo '<p>Product of this brand is out of store !!</p><br>';
                echo '<p>Please select another brand.</p>';
            } ?>

        </div>
        <div  >
            <h2>CATEGORIES</h2>
            <ul>
                <?php
                $getcat = $category->getallCategory();
                if ($getcat) {
                    while ($data = $getcat->fetch_assoc()) {

                ?>
                        <li><a href="productbycat.php?getcat_id=<?php echo $data['catId']; ?>"><?php echo $data['catName']; ?></a></li>
                <?php }
                } ?>
            </ul>

        </div>
        <div >
            <h2>Brand</h2>
            <ul>
                <?php
                $getcat = $brand->getallBrand();
                if ($getcat) {
                    while ($data = $getcat->fetch_assoc()) {

                ?>
                        <li><a href="productbybrand.php?getbrand_id=<?php echo $data['brandId']; ?>"><?php echo $data['brandName']; ?></a></li>
                <?php }
                } ?>
            </ul>

        </div>

    </div>
</div>
<?php include_once 'inc/footer.php' ?>