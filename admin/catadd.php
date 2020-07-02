﻿<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


<?php
$cat = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $catname = $_POST['catName'];
    $insertcat = $cat->catInsert($catname);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php
            if (isset($insertcat)) {
                echo $insertcat;
            }
            ?>
            <form action="catadd.php" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input name="catName" type="text" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>