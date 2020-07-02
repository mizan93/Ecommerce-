<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
$admin = new Admin();

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $dlt = $admin->deleteMessage($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Message</h2>
        <?php
        if (isset($dlt)) {
            echo $dlt;
        }

        ?>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Date & Time</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Comment</th>
                        <th>Address</th>
                        <th>gender</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $admin=new Admin();
                    $getdata = $admin->getallMessage();
                    if ($getdata) {
                        $i = 0;
                        while ($data = $getdata->fetch_assoc()) {
                            $i++;

                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $fm->formatDate($data['datetime']); ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['mobile']; ?></td>
                                <td><?php echo $fm->textShorten($data['comment'], 15); ?></td>
                                <td><?php echo $data['address']; ?></td>
                                <td><?php echo $data['gender']; ?></td>
                                <td>
                                    <?php
                                    if ($data['status'] == 0) { ?>
                                        Unseen
                                    <?php } elseif ($data['status'] == 1) { ?>
                                        Seen
                                </td>
                            <?php } ?>
                            <td>
                                <a href="viewmessage.php?id=<?php echo $data['cmrId']; ?>">view</a> ||
                                <a href="replay.php?r_id=<?php echo $data['cmrId']; ?>">Replay</a> ||
                                <a onclick="return confirm('R U sure to delete??')" href="?del=<?php echo $data['cmrId']; ?>">Remove</a>
                            </td>
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