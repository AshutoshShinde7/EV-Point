<?php
include('../connect.php');
if (isset($_POST["create"])) {

    $targetDirectory = "../img/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

        $imagePath = $targetFile;
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $year = mysqli_real_escape_string($conn, $_POST["year"]);
        $trsm = mysqli_real_escape_string($conn, $_POST["Transmission"]);
        $type = mysqli_real_escape_string($conn, $_POST["type"]);
        $speed = mysqli_real_escape_string($conn, $_POST["speed"]);

        $sqlInsert = "INSERT INTO `cars` (`Image`, `Title`, `Price`, `Model-Year`, `Transmission`, `Fuel Type`, `Speed`) VALUES ('$imagePath', '$title', '$price', '$year', '$trsm', '$type', '$speed')";
        $result = mysqli_query($conn, $sqlInsert);

        session_start();

        $_SESSION["create"] = "Car Added Successfully!";
        header("Location:add-car.php");
    } else {
        die("Something went wrong");
    }
}
if (isset($_POST["add"])) {

    $targetDirectory = "../img/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

        $imagePath = $targetFile;
        $pname = mysqli_real_escape_string($conn, $_POST["p-name"]);
        $pprice = mysqli_real_escape_string($conn, $_POST["p-price"]);
        $pquantity = mysqli_real_escape_string($conn, $_POST["p-quantity"]);

        $sqlInsert = "INSERT INTO `parts` (`Image`, `p_name`, `p_price`, `p_quantity`) VALUES ('$imagePath', '$pname', '$pprice', '$pquantity')";
        $result = mysqli_query($conn, $sqlInsert);

        session_start();

        $_SESSION["add"] = "Part Added Successfully!";
        header("Location:add-parts.php");
    } else {
        die("Something went wrong");
    }
}
if (isset($_POST["edit"])) {
    $targetDirectory = "../img/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $imagePath = $targetFile;
        $id = $_POST["ID"];

        $sqlUpdate = "UPDATE cars SET Title = '$title', Price = '$price', Image = '$imagePath' WHERE ID = '$id'";

        if (mysqli_query($conn, $sqlUpdate)) {
            session_start(); 
            $_SESSION["update"] = "Car Updated Successfully!";
            header("Location:admin.php");
        } else {
            die("Something went wrong");
        }
    }
}