<?php
	include 'header.php';
	include 'conectare.php';
?>

<?php

	//$con = mysqli_connect("localhost", "root", "");
	//mysqli_select_db($con, "produse");

	if (isset($_GET['pid'])) {
		$sql = sprintf("SELECT * FROM produse WHERE prod_id =  %s", $_GET['pid']);
		$row = mysqli_query($conectare, $sql);
		$product = mysqli_fetch_array($row);
	}

	if (isset($_POST['add_to_cart'])) {
		if($product['prod_qty'] < $_POST['cantitate']){
			$message = "Ne pare rau, dar pe stoc mai avem doar ".$product['prod_qty']." produse!!!";
			echo "<script>alert('$message');</script>";
		}else{
			$sqlc = sprintf("INSERT INTO cumparaturi (c_prod_id, c_qty) VALUES(%s, %s)", $product['prod_id'], $_POST['cantitate']);
			mysqli_query($conectare, $sqlc);
			echo "<script>window.location='cart_page.php'</script>";
		}
		
	}


?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 <div class="main">
    <div class="content" align="center">
    	
    		<div class="clear"></div>
    	</div>
    	<div class="section group" align="center">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="<?php echo $product['prod_image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $product['prod_name'] ?></h2>
					<p><?php echo $product['prod_spec'] ?></p>					
					<div class="price">
						<p>Price: <span><?php echo '$'.$product['prod_price'] ?></span></p>
					</div>
					<!--<div>
						<input type="number" name="cantitate" value="1">
					</div>-->
				<!--<div class="add-cart" class="btn btn-success">-->
				<div>
					<form method="POST">
						<input type="number" name="cantitate" value="1">
						<!--<div class="button" class="btn btn-success"><span class="btn btn-success" name="add_to_cart"><a name="add_to_cart" href="cart_page.php">Add to Cart</a></span></div>-->
						<input type="submit" name="add_to_cart" value="Add to Cart">
					</form>
					<div class="clear"></div>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $product['prod_desc'] ?></p>
	    </div>
<?php 

	//$sql = sprintf("SELECT * FROM review WHERE r_prod_id = %s
	//			INNER JOIN utilizatori ON review.r_user_id=u_id", $_GET['pid']);


	
?>

	    <div class="product-desc" class="table-responsive">
			<h2>Product Reviews</h2>
			<table class="table table-bordered">
				<th><b>Nume Utilizator </b></th>
				<th><b>Review </b></th>
				<?php
					$sql = "SELECT * FROM review 
						INNER JOIN utilizatori ON review.r_user_id=u_id WHERE r_prod_id = $_GET[pid]";

						$result = mysqli_query($conectare, $sql);
					//$nr_rows = mysqli_num_rows($result);
					//if($nr_rows == 0){
					//	echo "Nu sunt review-uri pentru acest produs!";
					//}else{

						while ($row=mysqli_fetch_assoc($result))
						 {
							echo "<tr>";
							echo "<td>".$row['u_nume']."</td>";
							echo "<td>".$row['r_rev']."</td>";
							echo "</tr>";
						}
					//}

				?>
			</table>
	    </div>
	    <br>
	    

<?php
	if(isset($_POST['insert_review'])){
		$sql = "INSERT INTO review (r_prod_id, r_user_id, r_rev) VALUES ($_GET[pid], $_SESSION[id], '$_POST[rev_text]')";
		mysqli_query($conectare, $sql);
		?>
			<script>window.location="products.php"</script>
		<?php
	}
?>

	    <form method="POST">
	    	<textarea cols="60" rows="5" name="rev_text"></textarea>
	    	<input type="submit" name="insert_review" value="Add Review">
	    </form>


	    		
	</div>
				
 	</div>
	</div>
 
<?php
	include 'footer.php';
