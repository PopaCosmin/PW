<?php
	include 'header.php';
	include 'conectare.php';
?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php

	$sql="SELECT * FROM istoric 
			INNER JOIN utilizatori ON istoric.i_user_id=u_id
			INNER JOIN produse ON istoric.i_prod_id=prod_id";

	$records=mysqli_query($conectare, $sql);
?>


	<br>
	<div class="table table-bordered">
	<table class="table table-bordered" style="width:100%" border="2" cellpadding="1" cellspacing="1" border-collapse="collapse">
		<tr font="bold">
			<th hidden="on">ID</th>
			<th><b>NUME UTILIZATOR	</b></th>
			<th><b>PRODUS </b></th>
		</tr>

<?php

	$results_per_page = 10;

	$number_of_results = mysqli_num_rows($records);
	$number_of_pages = ceil($number_of_results / $results_per_page);

	if(!isset($_GET['page'])){
		$page = 1;
	}else{
		$page = $_GET['page'];
	}

	$this_page_first_result = ($page - 1) * $results_per_page;

    $sql="SELECT * FROM istoric 
			INNER JOIN utilizatori ON istoric.i_user_id=u_id
			INNER JOIN produse ON istoric.i_prod_id=prod_id LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $records = mysqli_query($conectare, $sql);
	
	while($row=mysqli_fetch_assoc($records))
	{
		//$image = mysqli_fetch_array($records);
		echo "<tr>";
		echo "<td hidden>".$row['i_id']."</td>";
		echo "<td>".$row['u_nume']."</td>";
		echo "<td>".$row['prod_name']."</td>";
		//echo "<td>".$row['u_username']."</td>";
		echo "</tr>";
	}
?>	

		</table>
	</div>
	<div align="center">
		<?php
		echo "Page: ";
		for ($page = 1; $page <= $number_of_pages; $page++) {
			echo '<a href="afisare_istoric.php?page=' . $page . '" >' . $page . '</a> ';
		}
		
		?>
		</div>
	<br>


<?php
	
	include 'footer.php';