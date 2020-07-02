<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
 
<?php
$cat = new Category();
        //    getting  delete id
if (isset($_GET['delcat'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);

	$delcat=$cat->deletecat($id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<!-- Showing message -->
			<?php 
			if (isset($delcat)) {
				echo $delcat;
			}
			 ?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$catlist = $cat->getallCategory();
					if ($catlist) {
						$i = 0;
						while ($data = $catlist->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $data['catName'] ?></td>
								<td><a href="catedit.php?catid=<?php echo $data['catId'] ?>">Edit</a> ||
									<a onclick="return confirm('Are you sure to delete?');" href="?delcat=<?php echo $data['catId'] ?>">Delete</a></td>
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