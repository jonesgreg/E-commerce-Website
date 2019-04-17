<?php
	if(isset($_POST['Submit'])) {
    require_once('PHP/connection.php');

      $sql = "INSERT INTO user(user_id, user_name, email, phone_number, gender, user_password, street, city, zipcode, state)
      VALUES (DEFAULT,?,?,?,?,?,?,?,?,?)";
      $stmt = mysqli_prepare($dbc, $sql);
      mysqli_stmt_bind_param($stmt, "sssssssss",$_POST['user_name'], $_POST['email'], $_POST['phone_number'], $_POST['gender'], $_POST['user_password'],
       $_POST['street'], $_POST['city'], $_POST['zipcode'], $_POST['state']);
      mysqli_stmt_execute($stmt);
      $affected_rows = mysqli_stmt_affected_rows($stmt);
      if($affected_rows == 1){
        header('Location: login.php?status=true');
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
      } else {
        echo 'Error Occurred<br />';
        echo mysqli_error();
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
      }

}
?>
