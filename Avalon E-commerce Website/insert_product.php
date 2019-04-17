<?php
	if(isset($_POST['Submit'])) {
    require_once('PHP/connection.php');
     $image = $_FILES['image']['tmp_name'];
      $img = file_get_contents($image);

      $sql = "INSERT INTO PRODUCT_TABLE(product_id, product_title, category_name, size, price, quantity, image)
      VALUES (DEFAULT,?,?,?,?,?,?)";
      $stmt = mysqli_prepare($dbc, $sql);
      mysqli_stmt_bind_param($stmt, "sssssssss", $_POST['product_title'], $_POST['category_name'], $_POST['size'], $_POST['price'],
       $_POST['quantity'], $_POST['$img']);
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
