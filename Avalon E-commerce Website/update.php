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

    <title>Insert Product</title>

    <link href="vendor/bootstrap/css/Bootstrap.min.css" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">E-Commerce Website: Add product</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin_dashboard.html">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br/>
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Insert Product</div>
        <div class="card-body">
            <form  method="post" action="update.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <label for="product_id">Product id </label>
                                <input type="text" id="product_id" name="product_id" class="form-control" placeholder="Enter product id" required="required" autofocus="autofocus">
                            </div>
                        </div>


                        <div class="form-label-group">
                                <label for="product_title">Product Title: </label>
                                <input type="text" id="product_title" name="product_title" class="form-control" placeholder="Enter product title" required="required" autofocus="autofocus">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <label for="category_name">Category: </label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="">--Choose a category--</option>
                                    <?php
                                    require_once('PHP/connection.php');
                                    $categories ="select * from category";
                                    $result = mysqli_query($dbc, $categories);
                                    while($row = mysqli_fetch_array($result)){
                                        $category_id = $row['category_id'];
                                        $category_name = $row['category_name'];
                                        echo "<option value='$category_id'>$category_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <label for="size">Size: </label>

                                <select class="form-control" id="size" name="size">
                                    <option value="">Choose a size</option>
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <label for="price">Price: </label>
                                <input type="text" id="price" name="price" class="form-control" placeholder="Enter price" min="10"required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div  class="form-label-group">
                                <label for="quantity">Quantity: </label>
                                <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <label for="image">Enter image:</label>
                                <input type="file" id="image" name="image"  placeholder="image" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-xl-right">
                    <input type="submit" class="btn btn-primary btn-block btn-sm" value="Submit" name="Submit">
                </div>
            </form>
        </div>
    </div>
</div>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<?php


if(isset($_POST['Submit'])) {
    require_once('PHP/connection.php');
    $product_id = $_POST['product_id'];
    $product_title = $_POST['product_title'];
    $price = $_POST['price'];
    $category_category_id = $_POST['category_id'];
    $prod_size = $_POST['size'];
    $prod_quantity = $_POST['quantity'];
    $product_image = $_FILES['image']['name'];
    $product_image_tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($product_image_tmp, "images/$product_image");

$update_product = 'CALL updateProduct(?,?,?,?,?,?,?)';
$stmt = mysqli_prepare($dbc, $update_product);
mysqli_stmt_bind_param($stmt, 'sssssss',  $product_id,$product_title, $price, $product_image, $category_category_id, $prod_size, $prod_quantity);
mysqli_stmt_execute($stmt);
$affected_rows = mysqli_stmt_affected_rows($stmt);

if ($affected_rows == 1) {
mysqli_stmt_close($stmt);
mysqli_close($dbc);

} else {
echo 'Error Occurred<br />';
echo mysqli_error($dbc);
}

}

?>

</body>

</html>



<? ob_flush(); ?>