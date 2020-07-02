<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$admin = new Admin();

if (isset($_GET['del_id'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['del_id']);
	$delslider = $admin->deleteSlider($id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Slider List</h2>
		<?php 
		if(isset($delslider)){
			echo $delslider;
		} 
		?>
		<div class="block">

			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
						<th>Slider Title</th>
						<th>Slider Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$getslider = $admin->GetSlider();
					if ($getslider) {
						$i = 0;
						while ($data = $getslider->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $data['title']; ?></td>
								<td><img src="<?php echo $data['image']; ?>" height="40px" width="60px" /></td>
								<td>
									<a onclick="return confirm('Are you sure to Edit ??');" href="slideredit.php?editslid_id=<?php echo $data['id']; ?>">Edit</a> ||
									<a onclick="return confirm('Are you sure to Delete ??');" href="?del_id=<?php echo $data['id']; ?>">Delete</a>
								</td>
							</tr><?php }
							} ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

<script type=" text/javascript"> $(document).ready(function() { setupLeftMenu(); $('.datatable').dataTable(); setSidebarHeight(); }); </script> <?php include 'inc/footer.php'; ?>