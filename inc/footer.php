</div>
<div class="footer">
    <div class="wrapper">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                    <li><a href="contact.php">About Us</a></li>
                    <li><a href="contact.php">Customer Service</a></li>
                    <li><a href="contact.php"><span>Advanced Search</span></a></li>
                    <li><a href="contact.php">Orders and Returns</a></li>
                    <li><a href="contact.php"><span>Contact Us</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Why buy from us</h4>
                <ul>
                    <li><a href="contact.php">About Us</a></li>
                    <li><a href="contact.php">Customer Service</a></li>
                    <li><a href="contact.php">Privacy Policy</a></li>
                    <li><a href="#"><span>Site Map</span></a></li>
                    <li><a href="#"><span>Search Terms</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>My account</h4>
                <ul>
                    <li><a href="login.php">Sign In</a></li>
                    <?php $login = Session::get('cmrLogin');
                    if ($login == true) { ?>
                        <li><a href="cart.php">View Cart</a></li>

                        <li><a href="#">My Wishlist</a></li> <?php } ?>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contact</h4>
                <?php
                $getdata = $admin->getAllcompanyInfo();
                if ($getdata) {
                    while ($data = $getdata->fetch_assoc()) {

                ?>
                        <ul>
                            <li><span><?php echo $data['phone']; ?></span></li>
                            <li><span><?php echo $data['email']; ?></span></li>
                        </ul>
                        <div class="social-icons">
                            <h4>Follow Us</h4>
                            <ul>
                                <li class="facebook"><a href="<?php echo $data['fb']; ?>" target="_blank"> </a></li>
                                <li class="twitter"><a href="<?php echo $data['tw']; ?>" target="_blank"> </a></li>
                                <li class="googleplus"><a href="<?php echo $data['glplus']; ?>" target="_blank"> </a></li>
                                <li class="contact"><a href="<?php echo $data['email']; ?>" target="_blank"> </a></li>
                                <div class="clear"></div>
                            </ul>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
        <div class="copy_right">
            <p>S online store BD &copy;<?php echo date('Y'); ?>&amp;
                All rights Reseverd </p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        /*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function() {
        SyntaxHighlighter.all();
    });
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<script src='js/ragister.js'></script>
</body>

</html>