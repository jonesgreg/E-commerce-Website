<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Delete Product</title>

    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">E-Commerce Website: delete product</a>
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
<main role="main" class="container">

    <div class="starter-template">

        <hr>


        <form method="post" action="delete.php">

            <div class="form-group">
                <label for="exampleFormControlInput1">Product I.D.
                    <?php if(isset($_GET['msg']) && $_GET['msg']!="") { ?>

                    <?php } ?>
                </label>
                <input type="text" class="form-control" name="product_id" id="product_id" placeholder="e.g., 1234">

            </div>
            <button type="submit" name="deleteFromPaper" class="btn btn-primary">Submit</button>

        </form>

        <?php
        $msg="";
        if(isset($_POST['deleteFromPaper'])) {
            require_once('PHP/connection.php');
            $product_id = $_POST['product_id'];
            if (empty($product_id) || $product_id === "") {
                $msg = "product I.D. cannot be empty. Please enter I.D. to delete";
                header('Location: delete.php?msg='.$msg);
            }else {
                require_once('PHP/connection.php');
                $sql = "SELECT * from product where product_id = '$product_id'";
                $result = $dbc->query($sql);
                if ($result -> num_rows > 0) {
                    // I.D. exists
                    // now, delete
                    $sql = "DELETE FROM product where product_id = '$product_id'";
                    if ($dbc->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $dbc->error;
                    }
                    $dbc->query($sql);
                    $dbc->close();
                }else{
                    echo "The given product I.D. does not exist";
                }
            }
        }
        ?>
    </div>

</main><!-- /.container -->


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>
