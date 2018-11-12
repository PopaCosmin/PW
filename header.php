<?php
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>e-SHOP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<link href='//fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
</head>
<body>


<!--
	<script type="text/javascript">
		function googleTranslateElementInit() {
 			 new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
		}
	</script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
-->






  <div class="wrap">
	<div class="header">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="POST">
				    	<input type="text" name="search" placeholder="Search for Products"> <!--onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}">-->
				    	<input type="submit"  value="SEARCH" >
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart_page.php" title="View my shopping cart" rel="nofollow">
							<strong class="opencart"> </strong>
								<span class="cart_title">Cart</span>
								<?php 
									include 'conectare.php';
									$count_q = 0;
									$sql = "SELECT * FROM cumparaturi";
									$result = mysqli_query($conectare, $sql);
									while ($row = mysqli_fetch_assoc($result)) {
										$count_q += $row['c_qty'];
									}
									echo $count_q;
									/*
									if(isset($_SESSION['count_q'])){
										echo '<span>'.$_SESSION['count_q'];
									}else{
										?>
										<span class="no_product">(empty)</span>
										<?php
									}*/
								?>
							</a>
						</div>
			      </div>
	    <div class="languages" title="language">
	    	<div id="language" class="wrapper-dropdown" tabindex="1"><?php if(isset($_GET['info']) && $_GET['info'] == 'ro'){echo "RO";}else{echo "EN";} ?>
						<strong class="opencart"> </strong>
						<ul class="dropdown languges">					
							 <li>
							 	<a href="index.php?info=en" title="English">
									<span><img src="images/gb.png" alt="en" width="26" height="26"></span><span class="lang">English</span>
								</a>
							</li>
							<li>
							 	<a href="index.php?info=ro" title="Română">
									<span><img src="images/ro.gif" alt="ro" width="26" height="26"></span><span class="lang">Română</span>
								</a>
							</li>
				   		</ul>
		     </div>
		     <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#language') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown').removeClass('active');
				});

			});

		</script>
		 </div>

		

		   <div class="login" action="login.inc.php">
		   		<?php
		   			if (isset($_SESSION['id'])) {
		        		echo '<span><a href="logout.inc.php"><p style="text-align: center; color: green; font-size: 15px;">'.$_SESSION['username'];
		           	}else{
		        		echo '<span><a href="login.php"><img src="images/login.png" alt="" title="login"/></a></span>';
		        	}
		   		?>
		   	   
		   </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>

<?php
	if (isset($_GET['info']) && $_GET['info'] == 'ro') {
			?>
				<div class="h_menu" align="center">
		<a id="touch-menu" class="mobile-menu" href="#">Meniu</a>
		<nav>
		<ul class="menu list-unstyled">
			<li><a href="index.php">ACASA</a></li>
			<li><a href="products.php">PRODUSE</a>			
				<ul class="sub-menu list-unstyled sub-menu2">
					<div class="navg-drop-main">
						<div class="nav-drop nav-top-brand"> 
							<li><a href="products.php?info=computers">CALCULATOARE</a></li>
							<li><a href="products.php?info=smartphones">TELEFOANE</a></li>
							<li><a href="products.php?info=smartwatches">CEASURI</a></li>
						</div>								
					</div>
				</ul>
			</li>
			<li><a href="products.php">MARCI</a>			
				<ul class="sub-menu list-unstyled sub-menu2">
				  <div class="navg-drop-main">
						<div class="nav-drop nav-top-brand"> 
							<li><a href="products.php?info=APPLE">APPLE</a></li>
							<li><a href="products.php?info=ASUS">ASUS</a></li>
							<li><a href="products.php?info=HP">HP</a></li>					
							<li><a href="products.php?info=HUAWEI">HUAWEI</a></li>
						    <li><a href="products.php?info=SAMSUNG">SAMSUNG</a></li>
						</div>								
					</div>
				</ul>
			</li>		
			<!--<li><a href="about.php">About</a></li>-->

			<?php
				if (isset($_SESSION['id']) && $_SESSION['username'] == 'admin') {
		        		?>
		        		<li><a href="afisare_produse.php">Editare Produse</a>
					        <ul class="sub-menu list-unstyled sub-menu2">
							  <div class="navg-drop-main">
									<div class="nav-drop nav-top-brand"> 
										<li><a href="afisare_produse.php">Afisare Produse</a></li>
										<li><a href="add_product.php">Adaugare Produse</a></li>
										<li><a href="edit_product.php">Editare Produse</a></li>					
									</div>								
								</div>
							</ul>
						</li>

						<li><a href="#">AFIASARE</a>
					        <ul class="sub-menu list-unstyled sub-menu2">
							  <div class="navg-drop-main">
									<div class="nav-drop nav-top-brand"> 
										<li><a href="afisare_utilizatori.php">Afisare Utilizatori</a></li>
										<li><a href="afisare_istoric.php">Istoric tranzactii</a></li>				
									</div>								
								</div>
							</ul>
						</li>
		<?php
				}
		    }else{//if(isset($_GET['info']) && $_GET['info'] == 'ro'){
		       	?>
		       		<div class="h_menu" align="center">
		<a id="touch-menu" class="mobile-menu" href="#">Menu</a>
		<nav>
		<ul class="menu list-unstyled">
			<li><a href="index.php">HOME</a></li>
			<li><a href="products.php">Products</a>			
				<ul class="sub-menu list-unstyled sub-menu2">
					<div class="navg-drop-main">
						<div class="nav-drop nav-top-brand"> 
							<li><a href="products.php?info=computers">Computers</a></li>
							<li><a href="products.php?info=smartphones">Smartphones</a></li>
							<li><a href="products.php?info=smartwatches">Smartwatches</a></li>
						</div>								
					</div>
				</ul>
			</li>
			<li><a href="products.php">Top Brand</a>			
				<ul class="sub-menu list-unstyled sub-menu2">
				  <div class="navg-drop-main">
						<div class="nav-drop nav-top-brand"> 
							<li><a href="products.php?info=APPLE">APPLE</a></li>
							<li><a href="products.php?info=ASUS">ASUS</a></li>
							<li><a href="products.php?info=HP">HP</a></li>					
							<li><a href="products.php?info=HUAWEI">HUAWEI</a></li>
						    <li><a href="products.php?info=SAMSUNG">SAMSUNG</a></li>
						</div>								
					</div>
				</ul>
			</li>		
			<!--<li><a href="about.php">About</a></li>-->

			<?php
				if (isset($_SESSION['id']) && $_SESSION['username'] == 'admin') {
		        		?>
		        		<li><a href="afisare_produse.php">Edit Products</a>
					        <ul class="sub-menu list-unstyled sub-menu2">
							  <div class="navg-drop-main">
									<div class="nav-drop nav-top-brand"> 
										<li><a href="afisare_produse.php">Show Products</a></li>
										<li><a href="add_product.php">Add Products</a></li>
										<li><a href="edit_product.php">Edit Products</a></li>					
									</div>								
								</div>
							</ul>
						</li>

						<li><a href="#">Show</a>
					        <ul class="sub-menu list-unstyled sub-menu2">
							  <div class="navg-drop-main">
									<div class="nav-drop nav-top-brand"> 
										<li><a href="afisare_utilizatori.php">Show Users</a></li>
										<li><a href="afisare_istoric.php">History</a></li>				
									</div>								
								</div>
							</ul>
						</li>
		        		<?php
		        }

   		
		    }
		      ?>
			
			<li><a href="contact.php">CONTACT</a></li>
			<div class="clear"> </div>
		</ul>
		</nav> 
		<script src="js/menu.js" type="text/javascript"></script>
		</div>
