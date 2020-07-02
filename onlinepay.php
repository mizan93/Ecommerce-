<?php include_once 'inc/header.php' ?>
<?php
$login = Session::get('cmrLogin');
if ($login == false) {
    header('Location:login.php');
}
?>
<style>

</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">

            </div>
        </div>
        <?php include_once 'inc/footer.php' ?>