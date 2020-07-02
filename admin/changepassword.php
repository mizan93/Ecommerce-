<?php include 'inc/header.php';
?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <?php  ?>
        <?php 
        $adminId=Session::get('adminId');
        if($_SERVER['REQUEST_METHOD']=='POST') {
            
            $crrpass=md5($_POST['crrpassword']);
            $newpass=md5($_POST['newpass']);
            $confpass=md5($_POST['confpass']);
           $sql="SELECT * FROM admin WHERE id=' $adminId'"; 
           $getpass=$db->select($query);
            if ($getpass) {
           $pass=$getpass->fetch_assoc();
               $pass=$pass['password'];
           if ($pass=$crrpass && $newpass==$confpass) {
               $sql= "UPDATE admin set password='$confpass' WHERE id='$adminId'";
               $pass=$db->update($sql);
               if ($pass) {
              $message='Password changed.';
           }else{
                $message = 'Password not changed.';

           }
        }}}
         ?>
        <h2>Change Password</h2>
        <?php if (isset($message)) {
            echo $message;
        } ?>
        <div class="block">
            <form method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Old Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder=" Old Password..." name="crrpassword" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>New Password</label>
                        </td>
                        <td>
                            <input type="password" name="newpass" placeholder=" New Password..." name="slogan" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Confirm Password</label>
                        </td>
                        <td>
                            <input type="password" name="confpass" placeholder="Confirem Password..." name="slogan" class="medium" />
                        </td>
                    </tr>


                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>