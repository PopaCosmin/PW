<?php
	include 'header.php';
	include 'conectare.php';
?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php

	$sql="SELECT * FROM utilizatori";

	$records=mysqli_query($conectare, $sql);
/*
	if(isset($_POST['delete'])){
		$data = $_POST['u_id'];


			$delete_query = sprintf("DELETE FROM utilizatori WHERE u_id = %s", $data);

			$delete_result = mysqli_query($conectare, $delete_query);

			if($delete_result){
				if(mysqli_affected_rows($conectare)){
					echo 'Data Deleted';
				}else{
					echo 'Data NOT Deleted';
				}
			}else{
				echo 'Delete error';
			}
			
		echo '<script>window.location="afisare_utilizatori.php"</script>';
		exit();
	}
*/

?>


	<br>
	<div class="table-responsive">
	<table class="table table-bordered" style="width:100%" border="2" cellpadding="1" cellspacing="1" border-collapse="collapse">
		<tr font="bold">
			<th hidden="on">ID</th>
			<th><b>NUME	</b></th>
			<th><b>PRENUME </b></th>
			<th><b>USERNAME </b></th>
			<!--<th></th>-->
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

	$sql = "SELECT * FROM utilizatori LIMIT " . $this_page_first_result . ',' . $results_per_page;
	$records=mysqli_query($conectare, $sql);

	while($util=mysqli_fetch_assoc($records))
	{
		//$image = mysqli_fetch_array($records);
		echo "<tr>";
		echo "<td hidden>".$util['u_id']."</td>";
		echo "<td>".$util['u_nume']."</td>";
		echo "<td>".$util['u_prenume']."</td>";
		echo "<td>".$util['u_username']."</td>";
		//echo "<td><form method='POST'><input type='submit' name='delete' value='Detele'></form></td>";
		echo "</tr>";
	}
?>	

		</table>
	</div>
	<div align="center">
		<?php
		echo "Page: ";
		for ($page = 1; $page <= $number_of_pages; $page++) {
			echo '<a href="afisare_utilizatori.php?page=' . $page . '" >' . $page . '</a> ';
		}
		
		?>
	</div>
	<br>
	<br>


<?php
	
	include 'footer.php';