<?php include_once 'inc/header.php' ?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Iphone</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getiphone = $product->getLatestIphone();
			if ($getiphone) {
				while ($data = $getiphone->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?pro_id=<?php echo $data['productId']; ?>"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
						<h2><?php echo $data['productName']; ?></h2>
						<p><span class="price">$<?php echo $data['price']; ?></span></p>
						<div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>">Add to cart</a></span></div>
					</div>
			<?php }
			} ?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Samsung</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getsumsang = $product->getLatestSumsang();
			if ($getsumsang) {
				while ($data = $getsumsang->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?pro_id=<?php echo $data['productId']; ?>"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
						<h2><?php echo $data['productName']; ?></h2>
						<p><span class="price">$<?php echo $data['price']; ?></span></p>
						<div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>">Add to cart</a></span></div>
					</div>
			<?php }
			} ?>

		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Asus</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getasus = $product->getLatestAsus();
			if ($getasus) {
				while ($data = $getasus->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?pro_id=<?php echo $data['productId']; ?>"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
						<h2><?php echo $data['productName']; ?></h2>
						<p><span class="price">$<?php echo $data['price']; ?></span></p>
						<div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>">Add to cart</a></span></div>
					</div>
			<?php }
			} ?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Hp</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$gethp = $product->getLatestHp();
			if ($gethp) {
				while ($data = $gethp->fetch_assoc()) {
			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?pro_id=<?php echo $data['productId']; ?>"> <img src="admin/<?php echo $data['image']; ?>" alt="" /></a>
						<h2><?php echo $data['productName']; ?></h2>
						<p><span class="price">$<?php echo $data['price']; ?></span></p>
						<div class="button"><span><a href="details.php?pro_id=<?php echo $data['productId']; ?>">Add to cart</a></span></div>
					</div>
			<?php }
			} ?>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php' ?>