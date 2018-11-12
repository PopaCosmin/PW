<?php
	include 'header.php';
    include 'conectare.php';
?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 <div class="main" data-page-type="overview">
   <!-- <div class="content">-->
    	<!--<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>-->

    	<?php  
    		/*if (isset($_GET['add_to_cart'])) {
                $sql = "INSERT INTO cumparaturi (c_prod_id, c_qty) VALUES($_GET['pid'], $_GET['cantitate'])";
                mysqli_query($conectare, $sql);
            }*/

    		$results_per_page = 6; //reprezinta numarul de produse afisate pe o pagina

            if(isset($_GET['info']) && $_GET['info'] == 'computers'){
                $sql = "SELECT * FROM produse WHERE prod_category = 'Computers'";
                $result = mysqli_query($conectare, $sql);
                $number_of_results = mysqli_num_rows($result);

                $number_of_pages = ceil($number_of_results / $results_per_page);
            }elseif (isset($_GET['info']) && $_GET['info'] == 'smartphones') {
                $sql = "SELECT * FROM produse WHERE prod_category = 'Smartphones'";
                $result = mysqli_query($conectare, $sql);
                $number_of_results = mysqli_num_rows($result);

                $number_of_pages = ceil($number_of_results / $results_per_page);
            }elseif(isset($_GET['info']) && $_GET['info'] == 'smartwatches'){
                $sql = "SELECT * FROM produse WHERE prod_category = 'Smartwatches'";
                $result = mysqli_query($conectare, $sql);
                $number_of_results = mysqli_num_rows($result);

                $number_of_pages = ceil($number_of_results / $results_per_page);
            }elseif(isset($_GET['info']) && $_GET['info'] == 'APPLE'){
                $sql = "SELECT * FROM produse WHERE prod_brand = 'APPLE'";
                $result = mysqli_query($conectare, $sql);
                $number_of_results = mysqli_num_rows($result);

                $number_of_pages = ceil($number_of_results / $results_per_page);
            }elseif(isset($_GET['info']) && $_GET['info'] == 'ASUS'){
                $sql = "SELECT * FROM produse WHERE prod_brand = 'ASUS'";
                $result = mysqli_query($conectare, $sql);
                $number_of_results = mysqli_num_rows($result);

                $number_of_pages = ceil($number_of_results / $results_per_page);
            }elseif(isset($_GET['info']) && $_GET['info'] == 'HP'){
                $sql = "SELECT * FROM produse WHERE prod_brand = 'HP'";
                $result = mysqli_query($conectare, $sql);
                $number_of_results = mysqli_num_rows($result);

                $number_of_pages = ceil($number_of_results / $results_per_page);
            }elseif(isset($_GET['info']) && $_GET['info'] == 'HUAWEI'){
                $sql = "SELECT * FROM produse WHERE prod_brand = 'HUAWEI'";
                $result = mysqli_query($conectare, $sql);
                $number_of_results = mysqli_num_rows($result);

                $number_of_pages = ceil($number_of_results / $results_per_page);
            }elseif(isset($_GET['info']) && $_GET['info'] == 'SAMSUNG'){
                $sql = "SELECT * FROM produse WHERE prod_brand = 'SAMSUNG'";
                $result = mysqli_query($conectare, $sql);
                $number_of_results = mysqli_num_rows($result);

                $number_of_pages = ceil($number_of_results / $results_per_page);
            }else{
        		$sql = "SELECT * FROM produse";
        		$result = mysqli_query($conectare, $sql);
        		$number_of_results = mysqli_num_rows($result);

        		$number_of_pages = ceil($number_of_results / $results_per_page);
            }

    		if(!isset($_GET['page'])){
    			$page = 1;
    		}else{
    			$page = $_GET['page'];
    		}

    		$this_page_first_result = ($page - 1) * $results_per_page;


            if(isset($_GET['info']) && $_GET['info'] == 'computers'){
                $sql = "SELECT * FROM produse WHERE prod_category = 'Computers' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }elseif (isset($_GET['info']) && $_GET['info'] == 'smartphones') {
                $sql = "SELECT * FROM produse WHERE prod_category = 'Smartphones' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }elseif (isset($_GET['info']) && $_GET['info'] == 'smartwatches') {
                $sql = "SELECT * FROM produse WHERE prod_category = 'Smartwatches' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }elseif (isset($_GET['info']) && $_GET['info'] == 'APPLE') {
                $sql = "SELECT * FROM produse WHERE prod_brand = 'APPLE' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }elseif (isset($_GET['info']) && $_GET['info'] == 'ASUS') {
                $sql = "SELECT * FROM produse WHERE prod_brand = 'ASUS' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }elseif (isset($_GET['info']) && $_GET['info'] == 'HP') {
                $sql = "SELECT * FROM produse WHERE prod_brand = 'HP' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }elseif (isset($_GET['info']) && $_GET['info'] == 'HUAWEI') {
                $sql = "SELECT * FROM produse WHERE prod_brand = 'HUAWEI' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }elseif (isset($_GET['info']) && $_GET['info'] == 'SAMSUNG') {
                $sql = "SELECT * FROM produse WHERE prod_brand = 'SAMSUNG' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }else{
                $sql = "SELECT * FROM produse LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conectare, $sql);
            }

    		


    		while($row = mysqli_fetch_array($result)){
    			?>
    			<!-- <div class="grid_1_of_4 images_1_of_4">   -->
    				<div class="col-md-4" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center""><!--class="grid_1_of_4 images_3_of_2">-->
						<a href="preview.php?pid=<?php echo $row['prod_id']; ?>"><img src="<?php echo $row['prod_image'] ?>" style="width:300px; height:300px" class="img-responsive"/></a>
						<h3 class="text-info"><?php echo $row['prod_name']  ?></h3>
						<!--<p><?php/* echo $row['prod_desc'] */ ?></p>-->
						<p><span class="strike"><del style="color: red"><?php echo '$' . ($row['prod_price'] + '0.1' * $row['prod_price']) ?></del></span><span class="price" class="text-danger"><?php echo '  $'.$row['prod_price']  ?></span></p>
						<!-- <div class="button" class="btn btn-success" name="add_to_cart"><span><img src="images/cart.jpg"/><a href="cart_page.php" name="shoping_cart" class="btn btn-success">Add to Cart</a></span> </div>-->
					    <div class="button"><span><a href="preview.php?pid=<?php echo $row['prod_id']; ?>" class="details">Details</a></span></div>
					</div>

    			<?php
    		}

    	?>

    		<div class="clear"></div>
    	</div>
			</div>

			<div align="center">
			<?php
			echo "Page: ";
			for ($page = 1; $page <= $number_of_pages; $page++) {
    			echo '<a href="products.php?page=' . $page . '" >' . $page . '</a> ';
    		}
			
    		?>
    		</div>
    		<br><br>
			
    </div>
 </div>
</div>
   
<?php
	include 'footer.php';

