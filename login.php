<?php include_once 'inc/header.php' ?>

<?php 
$login=Session::get('cmrLogin');
if ($login==true) {
	header('Location:order.php');
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
	$customerlogin = $customer->CustomerLogin($_POST);
}
?>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<?php
			if (isset($customerlogin)) {
				echo $customerlogin;
			} ?>
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>

			<form action="" method="post" id="member">
				<input name="email" type="text" placeholder="Email">
				<input name="password" type="password" placeholder="Password">
				<div class="buttons">
					<div><button name="login" class="grey">Sign In</button></div>
				</div>
			</form>
			<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>

		</div>
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
			$customerreg = $customer->CustomerInsert($_POST, $_FILES);
		}
		?>
		<div class="register_account">
			<h3>Register New Account</h3>
			<?php if (isset($customerreg)) {
				echo $customerreg;
			} ?>
			<form action="" method="post">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="username" placeholder="Name" required>
								</div>
								<div>
									<input type="text" name="password" placeholder="Password" required>
								</div>

								<div>
									<input type="text" name="email" placeholder="Email" required>
								</div>
								<div>
									<input type="text" name="phone" placeholder="Phone numbber" required>
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Address" required>
								</div>


								<div>
									<input type="text" name="city" placeholder="City" required>
								</div>

								<div>
									<input type="text" name="zipcode" placeholder="Zip-code" required>
								</div>
								<div>
									<input type="text" name="country" placeholder="Country" required>
								</div>


							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><button name="register" type="submit" class="grey">Create Account</button></div>
				</div>

				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include_once 'inc/footer.php' ?>