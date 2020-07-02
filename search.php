<?php include_once 'inc/header.php' ?>

<?php
$admin = new Admin();

if (isset($_GET['search'])) {
   
    $search = $_GET['search'];
}
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            
        <div class="section group">
            <?php

            $search_pro = $product->Search_Product($search);
            if ($search_pro) {
                while ($data = $search_pro->fetch_assoc()) {
            ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?pro_id=<?php echo $data['productId']; ?>"><img src="admin/<?php echo $data['image']; ?>" alt="" height="200px" /></a>
                        <h2><?php echo $data['productName']; ?> </h2>
                        <p><span class="price">$<?php echo $data['price']; ?></span></p>
                        
                        <div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>" class="details">Details</a></span></div>
                    </div>
            <?php }
            } else{?>
            <h4>Product not found</h4>
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
    </div>
    <?php include_once 'inc/footer.php' ?>