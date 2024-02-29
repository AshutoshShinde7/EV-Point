<?php
include '../connect.php';
if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $NAME = mysqli_real_escape_string($conn, $_POST['title']);
    $PRICE = mysqli_real_escape_string($conn, $_POST['price']);
    $YEAR = mysqli_real_escape_string($conn, $_POST['year']);
    $transmission = mysqli_real_escape_string($conn, $_POST['Transmission']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $speed = mysqli_real_escape_string($conn, $_POST['speed']);

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "../img/" . $img_name;

        if (move_uploaded_file($img_loc, '../img/' . $img_name)) {
            $sqlUpdate = "UPDATE cars SET `Title` = '$NAME', `Price` = '$PRICE', `Image` = '$img_des', `ModelYear` = '$YEAR', `Transmission` = '$transmission', `Fuel Type` = '$type', `Speed` = '$speed'  WHERE `ID` = '$id'";
            if (mysqli_query($conn, $sqlUpdate)) {
                $_SESSION['alert_message'] = "Successfully Updated";
                header("location: add-car.php");
                exit();
            } else {
                $_SESSION['alert_message'] = "Error updating record: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['alert_message'] = "Error moving uploaded file";
        }
    } else {
        $_SESSION['alert_message'] = "File upload error: " . $_FILES['image']['error'];
    }
}
?>