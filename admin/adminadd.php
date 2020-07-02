<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add admin</h2>
        <div class="block copyblock">
            <?php
$admin = new Admin();

            $role = Session::get('adminRole');
            if ($role != 0) {
                echo "<script>window.location = 'dasboard.php';</script>";
            }
            ?>
            <?php
            $admin = new Admin();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $insertedadmin = $admin->adminInsert($_POST);
            }
            ?>

            <?php
            if (isset($insertedadmin)) {
                echo $insertedadmin;
            }
            ?><form action="" method="post">
                <table class="form">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" placeholder="Enter Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" placeholder="Enter UserName..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" placeholder="Enter Email..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>Admin Role</td>
                        <td>
                            <select id="select" name="level">
                                <option disabled slelected>Select User Role</option>
                                <option value="0">Admin</option>
                                <option value="1">Subadmin</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Create" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>