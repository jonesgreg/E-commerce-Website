<? ob_start(); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Order Details</title>

      <link href="vendor/bootstrap/css/login.min.css" rel="stylesheet">

</head>

<body >

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">E-Commerce Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="admin_dashboard.html">Home
              <span class="sr-only">(current)</span>
            </a>

          </ul>
      </div>
    </div>
  </nav>
<br/>
  <div class="container">
    <br />

  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <br/>
  <br/>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Order#</th>
        <th scope="col">User ID</th>
        <th scope="col">Product ID</th>
        <th scope="col">Product Title</th>
        <th scope="col">Size</th>
        <th scope="col">Quantity</th>
        <th scope="col">Purchase Date</th>
      </tr>
    </thead>
    <tbody>

  <?php
    require_once('PHP/connection.php');
    $order = "SELECT team_b_db.order.order_id, User_user_id, team_b_db.order.product_product_id, team_b_db.product.product_title, size,
                team_b_db.order.quantity, purchase_date
              FROM team_b_db.order
              INNER JOIN team_b_db.quantity_size
              ON team_b_db.order.product_product_id = team_b_db.quantity_size.product_product_id
              INNER JOIN team_b_db.product
              ON team_b_db.product.product_id = team_b_db.quantity_size.product_product_id; ";
    $response = @mysqli_query($dbc, $order);
    // If the query executed properly proceed
    if($response){
      while($row = mysqli_fetch_array($response)){
        echo "<tr>";
        echo "<th scope=\"row\">"; echo $row['order_id']; echo "</th>";
        echo "<td>"; echo $row['User_user_id']; echo "</td>";
        echo "<td>"; echo $row['product_product_id']; echo "</td>";
        echo "<td>"; echo $row['product_title']; echo "</td>";
        echo "<td>"; echo $row['size']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['purchase_date']; echo "</td>";
        echo "</tr>";
      }

    }else {
        echo "Couldn't issue database query<br />";
        echo mysqli_error($dbc);
    }
// Close connection to the database
mysqli_close($dbc);

  ?>
</tbody>
</table>


</body>

</html>
<? ob_flush(); ?>
