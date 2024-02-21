<?php
if (isset($_GET['id'])) {
include("../connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM cars WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "Car Deleted Successfully!";
    header("Location:add-car.php");
}else{
    die("Something went wrong");
}
}else{
    echo "Book does not exist";
}