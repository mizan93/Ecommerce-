<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
$admin = new Admin();

if (isset($_GET['shift_id'])) {
	$shift_id=$_GET['shift_id'];
	$price=$_GET['price'];
	$datetime=$_GET['datetime'];
	$shift=$cart->productShift($shift_id,$price,$datetime);
}
if (isset($_GET['del_id'])) {
	$del_id=$_GET['del_id'];
	$price=$_GET['price'];
	$datetime=$_GET['datetime'];
	$del_product=$cart->productDelete($del_id,$price,$datetime);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Inbox</h2>
		<?php 
		if (isset($shift)) {
			echo $shift;
		}
		if (isset($del_product)) {
			echo $del_product;
		}
		?>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>SL.</th>
						<th>Customer ID</th>
						<th>Date & Time</th>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Adress</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$cart = new Cart();
					$fm = new Format();
					$getorder = $cart->getAllOrder();
					if ($getorder) {
						$i = 0;
						while ($data = $getorder->fetch_assoc()) {
							$i++;

					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $data['cmrId']; ?></td>
								<td><?php echo $fm->formatDate($data['datetime']); ?></td>
								<td><?php echo $data['productId']; ?></td>
								<td><?php echo $data['productName']; ?></td>
								<td><?php echo $data['quantity']; ?></td>
								<td><?php echo $data['price']; ?></td>
								<td><a href="customer.php?cus_id=<?php echo $data['cmrId']; ?>&price=<?php echo $data['cmrId']; ?>">Customer Details</a></td>
								<?php
								if ($data['status'] == 0) { ?>
									<td><a onclick="return confirm('Are you sure to shift order?? ');" href="?shift_id=<?php echo $data['cmrId']; ?>&
									price=<?php echo $data['price']; ?>&datetime=<?php echo $data['datetime']; ?>"> Shift Order</a></td>
								<?php } elseif($data['status'] == 1){?>
								<td> Pending </td>
								<?php }else{ ?>
									<td><a onclick="return confirm('Are you sure to confirm?? ');" href="?del_id=<?php echo $data['cmrId']; ?>&
									price=<?php echo $data['price']; ?>&datetime=<?php echo $data['datetime']; ?>"> Remove</a></td>
								<?php } ?>
								</tr>
					<?php }
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>