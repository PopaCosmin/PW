<?php
	include 'header.php';
	include 'conectare.php';
?>

<!--
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
-->

	<div id="upload_products">
		<form name="add_product" action="" method="POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Product Name</td>
					<td><input type="text" name="pname"></td>						
				</tr>
				<tr>
					<td>Product Brand</td>
					<td><input type="text" name="pbrand"></td>						
				</tr>
				<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice"></td>						
				</tr>
				<tr>
					<td>Product Quantity</td>
					<td><input type="text" name="pqty"></td>						
				</tr>
				<tr>
					<td>Product Description</td>
					<td><textarea cols="15" rows="5" name="pdesc"></textarea></td>						
				</tr>
				<tr>
					<td>Product Specification</td>
					<td><textarea cols="15" rows="5" name="pspec"></textarea></td>						
				</tr>
				<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>						
				</tr>
				<tr>
					<td>Product Category</td>
					<td><select name="pcategory">
						<option value="Computers">Computers</option>
						<option value="Smartwatches">Smartwatches</option>
						<option value="Smartphones">Smartphones</option>
					</select></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
				</tr>
			</table>
		</form>
<?php
	if (isset($_POST['submit1'])) {
		$v1 = rand(1111, 9999);
		$v2 = rand(1111, 9999);
		//print($v1);
		//print($v2);
		$v3 = $v1.$v2;
		$v3 = md5('$v3');

		$fnm = $_FILES['pimage']['name'];
		$dst = "./product_image/".$v3.$fnm;
		$dst1 = "product_image/".$v3.$fnm;
		move_uploaded_file($_FILES['pimage']['tmp_name'], $dst);

		mysqli_query($conectare, "INSERT INTO produse (prod_name, prod_brand, prod_price, prod_qty, prod_desc, prod_spec, prod_image, prod_category) VALUES('$_POST[pname]', '$_POST[pbrand]', $_POST[pprice], $_POST[pqty], '$_POST[pdesc]', '$_POST[pspec]', '$dst1', '$_POST[pcategory]')");
	}
?>

	</div>


<?php
	include 'footer.php';
