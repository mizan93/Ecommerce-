<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2> Comment</h2>
        <?php
$admin = new Admin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "UPDATE contact  SET 
            status=1
            WHERE
            cmrId='$id'";
            $data = $db->update($sql);
        }
        ?>
        <div class="block">
            <?php
            $sql = "SELECT * FROM contact WHERE cmrId='$id' ";
            $GETdata = $db->select($sql);
            if ($GETdata) {

                while ($data = $GETdata->fetch_assoc()) {

            ?>
                    <div>
                        <p>Name : <?php echo $data['name']; ?></p>
                        <p>FroM : <?php echo $data['address']; ?></p>
                        <p><?php echo $fm->formatDate($data['datetime']); ?></p>
                        <p>Comment : <?php echo $data['comment']; ?></p>
                    </div>

            <?php }
            } ?>

            <a style="background: green;" type="button" href="message.php">Ok</a>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>