<?php
	include 'header.php';
	include 'conectare.php';
?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #ccc; 
}

.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>


<?php

	$sql="SELECT * FROM produse";

	$records=mysqli_query($conectare, $sql);
?>


	<br>
	<table style="width:100%" border="2" cellpadding="1" cellspacing="1" border-collapse="collapse">
		<tr font="bold">
			<th hidden="on">ID</th>
			<th><b>NUME	</b></th>
			<th><b>BRAND </b></th>
			<th><b>PRET </b></th>
			<th><b>CANTITATE </b></th>
			<th><b>DESCRIERE </b></th>
			<th><b>SPECIFICATIE </b></th>
			<th><b>IMAGINE </b></th>
			<th><b>CATEGORIE </b></th>
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

	$sql = "SELECT * FROM produse LIMIT " . $this_page_first_result . ',' . $results_per_page;
	$records=mysqli_query($conectare, $sql);

	while($produse=mysqli_fetch_assoc($records))
	{
		//$image = mysqli_fetch_array($records);
		echo "<tr>";
		echo "<td hidden>".$produse['prod_id']."</td>";
		echo "<td>".$produse['prod_name']."</td>";
		echo "<td>".$produse['prod_brand']."</td>";
		echo "<td>$".$produse['prod_price']."</td>";
		echo "<td>".$produse['prod_qty']."</td>";
		echo "<td><button class='accordion'>Description</button><div class='panel'><p>".$produse['prod_desc']."</p></div></td>";
		echo "<td><button class='accordion'>Specification</button><div class='panel'><p>".$produse['prod_spec']."</p></div></td>";
		//echo "<td width='50' height='50'>".$produse['prod_image']."</td>";
		echo "<td style='width: 100px; height: 100px'><img src=".$produse['prod_image']."></td>";
		echo "<td>".$produse['prod_category']."</td>";
		echo "</tr>";
	}
?>	

		</table>
	<div align="center">
		<?php
		echo "Page: ";
		for ($page = 1; $page <= $number_of_pages; $page++) {
			echo '<a href="afisare_produse.php?page=' . $page . '" >' . $page . '</a> ';
		}
		
		?>
	</div>
	<br>

	<br>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>

	

<?php
	include 'footer.php';
