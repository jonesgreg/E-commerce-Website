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
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>

          </ul>
      </div>
    </div>
  </nav>
<br/>
  <div class="container">
    <br />
    <?php
           if(isset($_GET['login'])) {
             if(trim($_GET["login"]) == 'true') {
               echo "<center><h4 class=\"my-4\">Thank you for registering. Please Login!</h4></center>";
             }
           }
     ?>

    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form  method="post" action="login.php" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address"  autofocus="autofocus" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name = "password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login" name="Submit">

        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot_password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <?php
         if(isset($_GET['status'])) {
           if(trim($_GET["status"]) == 'true') {
             echo "<center><h4 class=\"my-4\">Email or password incorrect. Please try again!</h4></center>";
           }
         }
   ?>
  <?php
  	if(isset($_POST['Submit'])) {
      require_once('PHP/connection.php');
      $query = "CALL credentialsMatch(?,?)";
      $stmt = mysqli_stmt_init($dbc);
      if(!mysqli_stmt_prepare($stmt, $query))
      {
          echo "Failed to prepare statement\n";
      }
      else
      {
        $email = $_POST['email'];
        $password = $_POST['password'];
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        echo mysqli_error($dbc);
        echo $row[0];
        if($row[0] == 'Match'){

          mysqli_stmt_close($stmt);
          mysqli_close($dbc);
          header('Location: admin_dashboard.html');
        } else {
        	echo mysqli_error($dbc);
          mysqli_stmt_close($stmt);
          mysqli_close($dbc);
          header('Location: login.php?status=true');
        }
      }
  }
  ?>



</body>

</html>
<? ob_flush(); ?>
