<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
 
<?php
$product = new Product();
$fm = new Format();

if (isset($_GET['delid'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delid']);
	$delproduct = $product->delete_Product($id);
		}
?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Post List</h2>
		<div class="block">
			<?php
			 if(isset($delproduct))
			echo $delproduct; 
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Brand</th>
						<th>image</th>
						<th>Price</th>
						<th>Description</th>
						<th>Date</th>
						<th>type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$productlist = $product->getallProduct();
					if ($productlist) {
						$i = 0;
						while ($data = $productlist->fetch_assoc()) {
							$i++;
					?>
			<tr class="odd gradeX">
				<td><?php echo $i; ?></td>
				<td><?php echo $data['productName']; ?></td>
				<td><?php echo $data['catName']; ?></td>
				<td><?php echo $data['brandName']; ?></td>
				<td><img src="<?php echo $data['image']; ?>" height="40px" width="60px" alt=""></td>
				<td>$<?php echo $data['price']; ?></td>

				<td><?php echo $fm->textShorten($data['body'], 30); ?></td>
				<td><?php echo $data['date']; ?></td>
				<td><?php
					if ($data['type'] == 0) {
						echo 'Featured';
					} else {
						echo 'General';
					}
					?></td>


				<td><a href="productedit.php?product_id=<?php echo $data['productId']; ?>">Edit</a> ||
					<a onclick="return confirm('Are you sure to delete??');" href="?delid=<?php echo $data['productId']; ?>">Delete</a></td>
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