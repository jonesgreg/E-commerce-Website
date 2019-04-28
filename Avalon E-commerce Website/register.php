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

  <title>Register</title>

    <link href="vendor/bootstrap/css/login.min.css" rel="stylesheet">

</head>
<br/>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">E-Commerce Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
          </li>
          </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form  method="post" action="db-register.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter your name" required="required" autofocus="autofocus">
                  <label for="user_name">Enter your name</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number" min="10" required="required">
                  <label for="phone_number">Phone Number</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="gender"></label>
                         <select class="form-control" id="gender" name="gender">
                               <option value="">--Choose a gender--</option>
                               <option value="male">Male</option>
                               <option value="female">Female</option>
                        </select>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div  class="form-label-group">
                  <input type="text" id="street" name="street" class="form-control" placeholder="Street" required="required">
                  <label for="street">Street</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="city" name="city" class="form-control" placeholder="City" required="required">
                  <label for="city">City</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="state" name="state" class="form-control" placeholder="State" required="required">
                  <label for="state">State</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="Zipcode" required="required">
                  <label for="zipcode">Zipcode</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="email">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter password" required="required">
                  <label for="user_password">Password</label>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Register" name="Submit">
        </form>
      </div>
    </div>
  </div>
  <?php
         if(isset($_GET['status'])) {
           if(trim($_GET["status"]) == 'true') {
             echo "<center><h4 class=\"my-4\">Email already exists. Please use another email or try login!</h4></center>";
           }
         }
   ?>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<? ob_flush(); ?>
