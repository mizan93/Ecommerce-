<?php include_once 'inc/header.php' ?>
<?php
$admin = new Admin();

$login=Session::get('cmrLogin');
if($login==false)
header('Location:login.php');
 ?>
<?php
if (isset($_GET['del_product'])) {
    $del_product=$_GET['del_product'];
    $deldata=$product->Deletecomparedata($cmrId,$del_product);
}
?>

<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>compare</h2>

				<table class="tblone">
					<tr>
						<th>SL</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Brand Name</th>

						<th>Image</th>
						<th>Action</th>
					</tr>

					<?php
					$cmrId = Session::get('cmrId');
					$getproduct = $product->getProductToCompare($cmrId);
					if ($getproduct) {
						$i = 0;
						while ($data = $getproduct->fetch_assoc()) {
							$i++;
					?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $data['productName']; ?></td>
								<td>$ <?php echo $data['price']; ?></td>
								<td><?php echo $data['brandName']; ?></td>

								<td><img src="admin/<?php echo $data['image']; ?>"></td>
								<td> <a href="details.php?pro_id=<?php echo $data['productId']; ?>">View</a> ||

									<a onclick="return confirm('Are you sure to delete??');" href="?del_product=<?php echo $data['productId']; ?>">Remove</a></td>

							</tr>

					<?php }
					} ?>

				</table>

			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include_once 'inc/footer.php' ?>