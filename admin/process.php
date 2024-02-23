<?php

session_start();

include('../connect.php');

// Adding Cars 

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

        $_SESSION["create"] = "Car Added Successfully!";
        header("Location:add-car.php");
    } else {
        die("Something went wrong");
    }
}

// Adding Parts 

if (isset($_POST["add"])) {

    $targetDirectory = "../img/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

        $imagePath = $targetFile;
        $pname = mysqli_real_escape_string($conn, $_POST["p-name"]);
        $pprice = mysqli_real_escape_string($conn, $_POST["p-price"]);
        $pquantity = trim($_POST['p-quantity']);

        $sqlInsert = "INSERT INTO `parts` (`Image`, `p_name`, `p_price`, `p_quantity`) VALUES ('$imagePath', '$pname', '$pprice', '$pquantity')";
        $result = mysqli_query($conn, $sqlInsert);

        $_SESSION["add"] = "Part Added Successfully!";
        header("Location:add-parts.php");
    } else {
        die("Something went wrong");
    }
}

// Editing Cars 

// if (isset($_POST["edit"])) {
//     $targetDirectory = "../img/"; 
//     $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    
//     if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
//         if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
//             $imagePath = $targetFile;
//         } else {
//             die("Failed to move uploaded file.");
//         }
//     } else {
//         die("Error uploading file: " . $_FILES["image"]["error"]);
//     }

//     $price = mysqli_real_escape_string($conn, $_POST["price"]);
//     $title = mysqli_real_escape_string($conn, $_POST["title"]);
//     $id = mysqli_real_escape_string($conn, $_POST["id"]);

//     $sqlUpdate = "UPDATE cars SET Title = '$title', Price = '$price', Image = '$imagePath' WHERE ID = '$id'";

//     if (mysqli_query($conn, $sqlUpdate)) {
//         $_SESSION["update"] = "Car Updated Successfully!";
//         header("Location: add-car.php");
//         exit(); 
//     } else {
//         die("Something went wrong: " . mysqli_error($conn));
//     }
// }
