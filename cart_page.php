<?php
	include 'header.php';
	include 'conectare.php';
?>

<?php
	
	if(isset($_GET['info']) && $_GET['info'] = 'delete'){
		$sql = "DELETE FROM cumparaturi WHERE c_id = $_GET[id]";
		mysqli_query($conectare, $sql);
		echo '<script>window.location="cart_page.php"</script>';
	}


	if (isset($_POST['shop'])) {
		$sql = "SELECT * FROM cumparaturi";
		$result = mysqli_query($conectare, $sql);
		while ($reg = mysqli_fetch_assoc($result)) {
			mysqli_query($conectare, "INSERT INTO istoric (i_user_id, i_prod_id) VALUES($_SESSION[id], $reg[c_prod_id])");

			$sqlu = "SELECT * FROM produse WHERE prod_id = $reg[c_prod_id]";
			$resultu = mysqli_query($conectare, $sqlu);
			$row = mysqli_fetch_array($resultu);

			mysqli_query($conectare, "UPDATE produse SET prod_qty = ($row[prod_qty] - $reg[c_qty]) WHERE prod_id = $reg[c_prod_id]");
		}

		$sql = "DELETE FROM cumparaturi";
		mysqli_query($conectare, $sql);

		$message = "Ati finalizat comanda!!!";
		echo "<script>alert('$message');</script>";
		echo '<script>window.location="index.php"</script>';
	}

?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<div class="table-responsive">
		<br>
		<table class="table table-bordered">
			<tr>
				<th width="40%">Product Name</th>
				<th width="10%">Quantity</th>
				<th width="20%">Price</th>
				<th width="15%">Total</th>
				<th width="5%">Action</th>
			</tr>
		<?php
			$count_q = 0;
			$sql = "SELECT * FROM cumparaturi INNER JOIN produse ON cumparaturi.c_prod_id=produse.prod_id";
			$result = mysqli_query($conectare, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
					echo "<td>".$row['prod_name']."</td>";
					echo "<td>".$row['c_qty']."</td>";
					echo "<td>$".$row['prod_price']."</td>";
					echo "<td>$".($row['prod_price'] * $row['c_qty'])."</td>";
					?>
					<td><a href="cart_page.php?info=delete&id=<?php echo $row['c_id']?>"><input type="submit" name="delete" value="Remove"></a></td>
					<?php
				echo "</tr>";
			}
		?>
			
		</table>

		<div class="button" align="center" style="margin-top:5px;" class="btn btn-success">
			<?php if(isset($_SESSION['id'])){
					?>
			<form method="POST">
				<input type="submit" name="shop" value="Shop">
			</form>
				<?php
				}else{
					echo "Pentru a putea comanda, va rugam sa va autentificati!!!";
				}
				?>
		</div>
		
<?php
	include 'footer.php';	