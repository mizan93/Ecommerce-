<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/slider.php' ?>

<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Feature Products</h3>
			</div>

			<div class="section group">
				<?php
				$featured_product = $product->getFeatured_Product();
				if ($featured_product) {
					while ($data = $featured_product->fetch_assoc()) {
				?>
						<div class="grid_1_of_4 images_1_of_4">
							<a href="details.php?pro_id=<?php echo $data['productId']; ?>"><img src="admin/<?php echo $data['image']; ?>" alt="" height="200px" /></a>
							<h2><?php echo $data['productName']; ?> </h2>
							<p><span class="price">$<?php echo $data['price']; ?></span></p>
							<div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>" class="details">Details</a></span></div>
						</div>
				<?php }
				} ?>
				<div class="clear"></div>
			</div>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>General Products</h3>
			</div>

			<div class="section group">
				<?php
				$general_product = $product->getGenearel_Product();
				if ($general_product) {
					while ($data = $general_product->fetch_assoc()) {
				?>
						<div class="grid_1_of_4 images_1_of_4">
							<a href="details.php?pro_id=<?php echo $data['productId']; ?>"><img src="admin/<?php echo $data['image']; ?>" height="200px" alt="" /></a>
							<h2><?php echo $data['productName']; ?> </h2>
							<p><span class="price">$<?php echo $data['price']; ?></span></p>
							<div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>" class="details">Details</a></span></div>
						</div>
				<?php }
				} ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php' ?>