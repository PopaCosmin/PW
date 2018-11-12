<?php
  include 'header.php';
  include 'conectare.php';
?>

<meta http-equiv="Content-Type" content="text/html; char=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<br>

<?php

$sql="SELECT * FROM produse";
//$output='';
//collect
if(isset($_POST['search']))
{
      $searchq=strtoupper($_POST['search']);
      $searchq=preg_replace("#[^0-9a-zA-Z]#i","",$searchq);
      
      $results_per_page = 6; //reprezinta numarul de produse afisate pe o pagina
      if(!isset($_GET['page'])){
              $page = 1;
            }else{
              $page = $_GET['page'];
            }

            $this_page_first_result = ($page - 1) * $results_per_page;


      $sql = sprintf("SELECT * FROM produse WHERE prod_name LIKE '%s' OR prod_brand LIKE '%s' LIMIT %d, %d", $searchq, $searchq, $this_page_first_result, $results_per_page);
     // $query=mysqli_query($conectare, $sql);
      //$count=mysqli_num_rows($query);

      $result = mysqli_query($conectare, $sql);
      $number_of_results = mysqli_num_rows($result);

     $number_of_pages = ceil($number_of_results / $results_per_page);

     
          //$count
      if($number_of_results==0){
        echo 'There was no search results!';
      }else{
         while($row = mysqli_fetch_array($result)){
              ?>
              <!-- <div class="grid_1_of_4 images_1_of_4">   -->
                <div class="col-md-4" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center""><!--class="grid_1_of_4 images_3_of_2">-->
                <a href="preview.php?pid=<?php echo $row['prod_id']; ?>"><img src="<?php echo $row['prod_image'] ?>" style="width:300px; height:300px" class="img-responsive"/></a>
                <h3 class="text-info"><?php echo $row['prod_name']  ?></h3>
                <!--<p><?php/* echo $row['prod_desc'] */ ?></p>-->
                <p><span class="strike"><del style="color: red"><?php echo '$' . ($row['prod_price'] + '0.1' * $row['prod_price']) ?></del></span><span class="price" class="text-danger"><?php echo '  $'.$row['prod_price']  ?></span></p>
                 <div class="button" class="btn btn-success" name="add_to_cart"><span><img src="images/cart.jpg"/><a href="cart_page.php?action=add&id=<?php echo $row['prod_id']; ?>" name="shoping_cart" class="btn btn-success">Add to Cart</a></span> </div>
                  <div class="button"><span><a href="preview.php?pid=<?php echo $row['prod_id']; ?>" class="details">Details</a></span></div>
              </div>

              <?php
            }//end while
        } //end else
          

}//end if

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
      






      <!--  echo "</table>";-->
  



<?php
  include 'footer.php';

