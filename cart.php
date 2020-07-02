<?php include_once 'inc/header.php' ?>
<?php
$admin = new Admin();
 if (isset($_GET['del_product'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['del_product']);
	$del_product = $cart->deletePordcut($id);
} ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
	$updatecart = $cart->updateCart($cartId, $quantity);
	if ($quantity <= 0) {
		$del_product = $cart->deletePordcut($cartId);
	}
}
?>
<?php 
if (!isset($_GET['id'])) {
	 echo '<meta http-equiv="refresh" content="0;URL=?id=live"/ />';
}
?>

<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>
				<?php if (isset($del_product)) {
					echo $del_product;
				} ?>
				<?php
				if (isset($updatecart)) {
					echo $updatecart;
				}

				?>

				<table class="tblone">
					<tr>
						<th width="5%">SL</th>
						<th width="30%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="15%">Quantity</th>
						<th width="25%">Total Price</th>
						<th width="10%">Action</th>
					</tr>

					<?php
					$product = $cart->getCartProduct();
					if ($product) {
						$i = 0;
						$sum = 0;
						$quantity=0;
						while ($data = $product->fetch_assoc()) {
							$i++;
					?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $data['productName']; ?></td>
								<td><img src="admin/<?php echo $data['image']; ?>"></td>
								<td>$ <?php echo $data['price']; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $data['cartId']; ?>" />
										<input type="number" name="quantity" value="<?php echo $data['quantity']; ?>" />
										<input onclick="return confirm('Are you sure to update??');" type="submit" name="submit" value="Update" />
									</form>
								</td>
								<td>$ <?php
										$total = $data['price'] * $data['quantity'];
										echo $total;
										?></td>
								<td><a onclick="return confirm('Are you sure to delete??');" href="?del_product=<?php echo $data['cartId']; ?>">X</a></td>

							</tr>
							<?php
							$quantity=$quantity+$data['quantity'];
							$sum = $sum + $total;
							Session::set('sum', $sum);
							Session::set('quantity', $quantity);
							?>
					<?php }
					} ?>

				</table>
				<?php
				$getdata = $cart->checkCartproduct();
				if ($getdata) {
				?>
				<table style="float: right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total($) :</th>
						<td><?php echo $sum; ?></td>
					</tr>
					<tr>
						<th>Vat :</th>
						<td>10%</td>
					</tr>
					<tr>
						<th>Grand Total($) :</th>
						<td><?php
							$vat = $sum * 0.1;
							$grand_total = $sum + $vat;
							echo $grand_total;
							?></td>
					</tr>
				</table>
				<?php }else{
					header('Location:index.php');
					//echo "Cart is Empty !! Plese shop now.";
				
					}?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="payment.php"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include_once 'inc/footer.php' ?>