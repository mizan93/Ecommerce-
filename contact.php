<?php
include_once 'inc/header.php';
include_once 'classes/validation.php';
$admin = new Admin();

?>

<div class="main">
	<div class="content">
		<div class="support">
			<div class="support_desc">
				<h3>Live Support</h3>
				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
			</div>
			<img src="web/images/contact.png" alt="" />
			<div class="clear"></div>
		</div>
		<div class="section group">
			<div class="col span_2_of_3">
				<div class="contact-form">
					<h2>Contact Us</h2>
					<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
						
						$senddata = $customer->sendContactInfo($_POST);
						if (isset($senddata)) {
							echo $senddata;
						}
					}


					?>

					<form method="post" id="registration" style="width: 300px;">
						<input type="text" class="form-control" name="name" placeholder="Name" />
						<br />
						<input type="text" class="form-control" name="email" placeholder="Email" />
						<br />
						<input type="text" class="form-control" name="mobile"  placeholder="Mobile No. " />
						<br />
						<div class="gender">
							<label class="radio-inline"><input type="radio" name="gender" class="form-contorl" value="male" />Male</label>
							<label class="radio-inline"><input type="radio" name="gender" class="form-contorl" value="female"/>Female</label>
						</div>
						<br />
						<label for="address">Address</label>
						<select class="form-control" name="address">
							<option value="0" selected="" disabled="">--SELECT DIVISION--</option>
							<option>Dhaka </option>
							<option>Rajshahi</option>
							<option>Chitagang</option>
							<option>Sylhet</option>
							<option>Rangpur </option>
							<option>Moymansingh </option>
						</select>
						<br />
						<br/>
						<textarea class="form-control" name="comment" placeholder="Comment"></textarea>
						<br />
						<button name="submit"  type="submit" class="btn btn-primary">Submit</button>
					</form>

				</div>
			</div>
			<div class="col span_1_of_3">
				<div class="company_address">
					<h2>Company Information :</h2>
					<?php
					$getdata = $admin->getAllcompanyInfo();
					if ($getdata) {
						while ($data = $getdata->fetch_assoc()) {

					?>
							<p><?php echo $data['address']; ?></p>
							<p>Phone:<?php echo $data['phone']; ?></p>
							<p>Fax: <?php echo $data['fax']; ?></p>
							<p>Email: <span><?php echo $data['email']; ?></span></p>
							<p>Follow on:
								<span><a href="<?php echo $data['fb']; ?>">Facebook</a></span>,
								<span><a href="<?php echo $data['tw']; ?>">Twitter</a></span>,
								<span><a href="<?php echo $data['glplus']; ?>">Google+</a></span>,
								<span><a href="<?php echo $data['linkdin']; ?>">Linkdin</a></span>
							</p>
					<?php }
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once 'inc/footer.php' ?>