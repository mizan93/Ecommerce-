<?php include '../classes/adminlogin.php';
?>
<?php
$al = new Adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$logincheck = $al->adminLogin($username, $password);
}
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<form action="login.php" method="post">
				<h1>Admin Login</h1>
				<span style="color:red;font-size:18px;">
					<?php
					if (isset($logincheck)) {
						echo $logincheck;
					}
					?>
				</span>
				<div>
					<input type="text" name="username" placeholder="Username" >
				</div>
				<div>
					<input type="password" name="password" placeholder="Password"  />
				</div>
				<div>
					<input type="submit" name="submit" value="Login" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="forgetpassword.php">Forget Password</a>
			</div><!-- button -->
			<div class="button">
				<a href="#">S-online store BD</a>
			</div><!-- button -->

		</section><!-- content -->
	</div><!-- container -->
</body>

</html>