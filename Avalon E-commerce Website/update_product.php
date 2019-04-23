<?php
if(isset($_POST['Submit'])) {
require_once('PHP/connection.php');
$image = $_FILES['image']['tmp_name'];
$img = file_get_contents($image);
$product_id=trim($_GET['product_id']);
$product_title=trim($_POST['product_id']);
$category_name=trim($_POST['category_name']);
$size=trim($_POST['size']);
$price=trim($_POST['user_age']);
$quantity=trim($_POST['quantity']);
$image=trim($_POST['$img']);
$sql="UPDATE product SET product_title='".$product_title."',category_name='".$category_name."',size='".$size."',price='".$price."',quantity='".$quantity."',image='".$img."'  WHERE product_id=";
$sql=$sql.$product_id;
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

        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
    }

}

?>

