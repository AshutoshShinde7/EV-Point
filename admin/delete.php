<?php
session_start();

if (isset($_GET['id'])) {
    include("connect.php");

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM parts OR cars WHERE ID='$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["delete"] = "Car Deleted Successfully!";
        header("Location: add.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Car does not exist";
}
?>