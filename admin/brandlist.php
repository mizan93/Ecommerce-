<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
$brand = new Brand();
//    getting  delete id
if (isset($_GET['delbrand'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);

    $delbrand = $brand->deletebrand($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <!-- Showing message -->
            <?php
            if (isset($delbrand)) {
                echo $delbrand;
               
            }
            ?></h2>
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
                    $brandlist = $brand->getallBrand();
                    if ($brandlist) {
                        $i = 0;
                        while ($data = $brandlist->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['brandName'] ?></td>
                                <td><a href="brandedit.php?brandid=<?php echo $data['brandId'] ?>">Edit</a> ||
                                    <a onclick="return confirm('Are you sure to delete?');" href="?delbrand=<?php echo $data['brandId'] ?>">Delete</a></td>
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