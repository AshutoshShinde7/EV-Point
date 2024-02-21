<?php
if (isset($_POST['update'])) {
    include '../connect.php'; // Assuming your connection is in 'connect.php'

    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    echo "hellooooo" . $id;
    $NAME = mysqli_real_escape_string($conn, $_POST['title']);
    $PRICE = mysqli_real_escape_string($conn, $_POST['price']);

    // Check if an image was uploaded
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "../img/" . $img_name;
        $_SESSION['alert_message'] = "I AM HERE";

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($img_loc, '../img/' . $img_name)) {
            $sqlUpdate = "UPDATE cars SET Title = '$NAME', Price = '$PRICE', Image = '$img_des' WHERE ID = '$id'";
            if (mysqli_query($conn, $sqlUpdate)) {
                // Redirect after successful update
                $_SESSION['alert_message'] = "Successfully Updated";

                header("location: add-car.php");
                exit(); // Ensure script stops execution after redirection
            } else {
                // echo "Error updating record: " . mysqli_error($conn);
                $_SESSION['alert_message'] = "Error updating record: " . mysqli_error($conn);

            }
        } else {
            $_SESSION['alert_message'] = "Error moving uploaded file";
            // echo "Error moving uploaded file.";
        }
    } else {
        $_SESSION['alert_message'] = "File upload error: " . $_FILES['image']['error'];

        // echo "File upload error: " . $_FILES['image']['error'];
    }
}
?>