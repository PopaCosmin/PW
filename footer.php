
<html>
<body>
 <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">

<?php
	if (isset($_GET['info']) && $_GET['info'] == 'ro') {
			?>
				<div class="col_1_of_4 span_1_of_4">
						<h4>INFORMATII</h4>
						<ul>
						<!--<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#"><span>Advanced Search</span></a></li>
						<li><a href="#">Orders and Returns</a></li>-->
						<li><a href="contact.php"><span>Intreaba-ne!</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>DE CE SA CUMPERI DE LA NOI?</h4>
						<ul>
						<!--<li><a href="about.php">About Us</a></li>
						
						<li><a href="#">Privacy Policy</a></li>-->
						<li><a href="contact.php"><span>Harta</span></a></li>
						<!--<li><a href="preview-2.php"><span>Search Terms</span></a></li>-->
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>CONTUL MEU</h4>
						<ul>
							<li><a href="login.php">Logheaza-te</a></li>
							<li><a href="cart_page.php">Vizualizeaza lista de produse</a></li>
							<!--<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>-->
							
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>Telefon: 0256-403000</span></li>
							<li><span>Fax: 0256-403021</span></li>
						</ul>
						<!--<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>-->
				</div>
			</div>
			<?php
			}else{
			?>
			
			<div class="col_1_of_4 span_1_of_4">
						<h4>INFORMATION</h4>
						<ul>
						<!--<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#"><span>Advanced Search</span></a></li>
						<li><a href="#">Orders and Returns</a></li>-->
						<li><a href="contact.php"><span>Live Support!</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>WHY TO BUY FROM US?</h4>
						<ul>
						<!--<li><a href="about.php">About Us</a></li>
						
						<li><a href="#">Privacy Policy</a></li>-->
						<li><a href="contact.php"><span>Site map</span></a></li>
						<!--<li><a href="preview-2.php"><span>Search Terms</span></a></li>-->
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>MY ACCOUNT</h4>
						<ul>
							<li><a href="login.php">Log in</a></li>
							<li><a href="cart_page.php">See your cart</a></li>
							<!--<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>-->
							
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>Phone: 0256-403000</span></li>
							<li><span>Fax: 0256-403021</span></li>
						</ul>
						<!--<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>-->
				</div>
			</div>
			<?php
			}?>
			
			
			
			
			
			<div class="copy_right">
				<p>&copy; 2018 e-SHOP . All Rights Reserved | Design by <a href="http://w3layouts.com">POPA Cosmin & ROMÎNESCU Raluca</a> </p>
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
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
							  <script defer src="js/jquery.flexslider.js"></script>
							  <script type="text/javascript">
								$(function(){
								  SyntaxHighlighter.all();
								});
								$(window).load(function(){
								  $('.flexslider').flexslider({
									animation: "slide",
									start: function(slider){
									  $('body').removeClass('loading');
									}
								  });
								});
							  </script>
</body>
</html>