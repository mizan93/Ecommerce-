
<?php include '../classes/adminlogin.php';

?>

<?php
$db = new Database();
$format = new Format();

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Password Recovary</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
    <div class="container">

        <section id="content">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $email1 = $format->validation($_POST['email']);

                $email = mysqli_real_escape_string($db->link, $email1);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo " <span style='color:red;font-size:18px;'>Invalid email address.</span>";
                } else {
                    $mailquery = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
                    $emailcheck = $db->select($mailquery);

                    if ($emailcheck) {
                        while ($result = $emailcheck->fetch_assoc()) {
                            $userid = $result['id'];
                            $username = $result['username'];
                        }
                        $text = substr($email, 0, 3);
                        $rand = rand(10000, 9999);
                        $newpass = '$text$rand';
                        $password = md5($newpass);

                        $updatesl = "UPDATE admin SET
        password='$password'
        WHERE id='$userid'
        ";
                        $updated = $db->update($updatesl);
                        $to = '$email';

                        $from = 'mrmizanbd93gmail.com';
                        $headers = "From: $from\n";
                        $headers .=   "MIME-Version: 1.0" . "\r\n";
                        $headers .=  "Content-type: text/html; charset=UTF-8" . "\r\n";

                        $subject = "Your password";
                        $message = "Your username is " . $username . " and Passord is " . $newpass . " Please visit website to login.";


                        $sendmail = mail($to, $subject, $message, $headers);
                        if ($sendmail) {
                            echo " <span style='color:red;font-size:18px;'>Check your email for new password.</span>";
                        } else {
                            echo " <span style='color:red;font-size:18px;'>Email not  sent!!</span>";
                        }
                    } else {

                        echo " <span style='color:red;font-size:18px;'>Email  not Exist !!</span>";
                    }
                }
            }
            ?>
            <form action="" method="post">
                <h1>Password Recovary</h1>
                <div>
                    <input type="text" placeholder="Enter email" required="" name="email" />
                </div>

                <div>
                    <input type="submit" value="Send Mail" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="login.php">Login</a>
            </div><!-- button -->
            <div class="button">
                <a href="#">S-online store Bd</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>