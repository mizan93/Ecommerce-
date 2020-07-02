<?php include_once 'inc/header.php' ?>
<?php
$admin = new Admin();

if (!isset($_GET['pro_id']) && $_GET['pro_id'] == null) {
	echo "<script>window.location = '404.php'; </script>";
	//header('Location: 404.php');
} else {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pro_id']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$quantity = $_POST['quantity'];
	$addcart = $cart->addTocart($quantity, $id);
}
?>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<?php

				$getproduct = $product->getSingle_product($id);
				if ($getproduct) {
					while ($data = $getproduct->fetch_assoc()) {

				?>
						<div class="grid images_3_of_2">
							<img src="admin/<?php echo $data['image']; ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2> <?php echo $data['productName']; ?>
							</h2>

							<div class="price">
								<p>Price: <span>$ <?php echo $data['price']; ?>
									</span></p>
								<p>Category: <span><?php echo $data['catName']; ?>
									</span></p>
								<p>Brand:<span> <?php echo $data['brandName']; ?>
									</span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1" />
									<input type="submit" class="buysubmit" name="submit" value="Buy Now" />
								</form>
							</div>
							<span style="color:red; font-size:18px;">
								<?php
								if (isset($addcart)) {
									echo $addcart;
								}

								?>
							</span>
							<?php
							$cmrId = Session::get('cmrId');
							if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
								$productId =  $_POST['productId'];
								$ins_compare = $product->inserttoCompare($productId, $cmrId);
							}
							if (isset($ins_compare)) {
								echo $ins_compare;
							}
							?>
							<?php

							$cmrId = Session::get('cmrId');

							if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
								$productId =  $_POST['productId'];
								$ins_wish = $product->inserttoWishlist($productId, $cmrId);
							}



							if (isset($ins_wish)) {
								echo $ins_wish;
							}
							?>
							<?php
							$login = Session::get('cmrLogin');
							if ($login) {
							?>
								<div class="add-cart">
									<form action="" method="post">
										<input type="hidden" class="buysubmit" name="productId" value="<?php echo $data['productId']; ?>" />
										<input type="submit" onclick="return confirm('Are you sure to add compare??');" class="buysubmit" name="compare" value="Add to compare" />
										<input type="submit" onclick="return confirm('Are you sure to add wishlist??');" class="buysubmit" name="wishlist" value="Add to wishlist" />
									</form>
								</div>
							<?php } else {

							?>
								<h4>login to see compare and wishlist button.</h4>
							<?php } ?>

						</div>
						<div class="product-desc">
							<h2>Product Details</h2>
							<?php echo $data['body']; ?>

						</div>
				<?php }
				} ?>
			</div>
			<div class="rightsidebar span_3_of_1">
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
			<div class="rightsidebar span_3_of_1">
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