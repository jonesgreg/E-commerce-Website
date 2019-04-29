<?php

//fetch_item.php

include('PHP/connection.php');

/*$query = "SELECT * FROM product ORDER BY id DESC"; */
/*$query = "SELECT * FROM PRODUCT_TABLE ORDER BY id DESC"; */

$sql = "SELECT product_id, product_title, price, quantity, image FROM PRODUCT_TABLE";


$result = $dbc->query($sql);

if($result-> num_rows > 0) {
while($row = $result-> fetch_assoc())  {
		echo '<div class="col-md-3" style="margin-top:12px;"
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
		        <img src="images/'.$row["image"].'" class="img-responsive" /><br />
						<h4 class="text-info">'.$row["product_title"].'</h4>
						<h4 class="text-danger">$ '.$row["price"] .'</h4>
						<input type="text" name="quantity" id="quantity' . $row["product_id"] .'" class="form-control" value="1" />
						<input type="hidden" name="hidden_name" id="product_title'.$row["product_id"].'" value="'.$row["product_title"].'" />
						<input type="hidden" name="hidden_price" id="price'.$row["product_id"].'" value="'.$row["price"].'" />
						<input type="button" name="add_to_cart" id="'.$row["product_id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
						</div>
				</div>
       ';

    }

  }
   $conn-> close();


?>
