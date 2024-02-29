<?php
session_start();
if (isset($_SESSION['alert_message'])) {
    echo "<script>alert('" . $_SESSION['alert_message'] . "');</script>";
    unset($_SESSION['alert_message']);
}
include '../connect.php';

if (isset($_POST['edt'])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $NAME = mysqli_real_escape_string($conn, $_POST['p_name']);
    $PRICE = mysqli_real_escape_string($conn, $_POST['p_price']);
    $pquantity = mysqli_real_escape_string($conn, $_POST['p_quantity']);

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "../img/" . $img_name;

        if (move_uploaded_file($img_loc, '../img/' . $img_name)) {
            $sqlUpdate = "UPDATE parts SET p_name = '$NAME', p_price = '$PRICE', p_quantity = '$pquantity', Image = '$img_des' WHERE ID = '$id'";
            if (mysqli_query($conn, $sqlUpdate)) {
                $_SESSION['alert_message'] = "Part Successfully Updated";
                header("location: add-parts.php");
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