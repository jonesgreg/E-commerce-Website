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


  <title>Login</title>

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
            <a class="nav-link" href="index.html">Home
              <span class="sr-only">(current)</span>
            </a>

          </ul>
      </div>
    </div>
  </nav>
<br/>
  <div class="container">
    <br />
    <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address</p>
        </div>
        <form method="post" action="forgot_password.php" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter email " required="required" autofocus="autofocus">
              <label for="email">Enter email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name = "password" class="form-control" placeholder="password" required="required">
              <label for="inputPassword">New Password</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Reset Password" name="Submit">
        </form>
        <div class="text-center">
                    <a class="d-block small" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <?php
         if(isset($_GET['status'])) {
           if(trim($_GET["status"]) == 'true') {
             echo "<center><h4 class=\"my-4\">Password successfully reset. Please Login!</h4></center>";
           }
         }
   ?>
  <?php
  	if(isset($_POST['Submit'])) {
      require_once('PHP/connection.php');
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sql = "CALL updateUserPassword(?,?)";
      $stmt = mysqli_prepare($dbc, $sql);
       mysqli_stmt_bind_param($stmt, "ss", $email, $password);
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
       $row = mysqli_fetch_array($result, MYSQLI_NUM);
       echo mysqli_error($dbc);
       echo $row[0];
       if($row[0] == 'Updated'){
         mysqli_stmt_close($stmt);
         mysqli_close($dbc);
         header('Location: forgot_password.php?status=true');
       } else {
         echo mysqli_error($dbc);
         mysqli_stmt_close($stmt);
         mysqli_close($dbc);
       }
  }
  ?>



</body>

</html>
<? ob_flush(); ?>
