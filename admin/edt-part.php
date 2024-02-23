<?php
session_start();
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CAR</title>
    <style>
        * {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        :root {
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            --main-color: #ffa500;
            --bg-color: #fff;
        }

        .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            flex-direction: column;
            padding-top: 20px;
            padding-bottom: 60px;
            background: #f5e6da;
        }

        header {
            padding-top: 30px;
            display: flex;
            justify-content: space-evenly;
            background: #f5e6da;
        }

        .form-container form {
            padding: 50px;
            border-radius: 20px;
            box-shadow: var(--box-shadow);
            background: #fff;
            text-align: center;
            width: 550px;
        }

        .form-container form h2 {
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
        }

        .form-container form input,
        .form-container form select {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
        }

        .form-container form select option {
            background: #fff;
        }

        .form-container form .text-box {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
            resize: none;
            overflow: hidden;
        }

        .form-btn {
            padding: 10px;
            border-radius: 5px;
            background: var(--main-color);
            color: var(--bg-color);
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
            text-decoration: none;
        }

        .form-btn:hover {
            background: #f1b545;
            color: #fff;
        }

        .form-container form .error-msg {
            margin: 10px 0;
            display: block;
            background: rgb(249, 154, 173);
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Add New Part</h1>
        <div>
            <a href="add-car.php" class="form-btn">Back</a>
        </div>
    </header>
    <div class="form-container">
        <form action="e-part.php" method="post" enctype="multipart/form-data">
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM parts WHERE ID=$id";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($result);
                ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id">

                <div>
                    <input type="file" name="image" value="<?php echo $row['Image'] ?>">
                    <img src="<?php echo $row['Image'] ?>" width='300px' height='150px' alt="">
                    <input type="hidden" name="Id" value="<?php echo $data['ID'] ?>">
                </div>
                <div>
                    <input type="text" value="<?php echo $data['p_name']; ?>"  name="p-name" placeholder="Name of the Part">
                </div>
                <div>
                    <input type="number" value="<?php echo $data['p_price']; ?>" name="p-price" placeholder="Price of the Part">
                </div>
                <div>
                    <input type="number" value="<?php echo $data['p_quantity']; ?>" name="p-quantity" placeholder="Enter the Quantity">
                </div>
                
                <div>
                    <button type="submit" name="edt" value="Edit Car" class="form-btn" style="width:100%">Edit
                        Part</button>
                </div>
                <?php
            } else {
                echo "<h3>Part Does Not Exist</h3>";
            }
            ?>

        </form>


    </div>
</body>
<article>
    <!-- <?php
    if (isset($_POST['update'])) {
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        // $ID = $_POST['Id'];
        $NAME = $_POST['name'];
        $PRICE = $_POST['price'];
        $IMAGE = $_FILES['image'];
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_des = "../img/" . $img_name;
        move_uploaded_file($img_loc, '../img/' . $img_name);

        $sqlUpdate = "UPDATE cars SET Title = '$NAME', Price = '$PRICE', Image = '$img_des' WHERE ID = '$id'";
        // mysqli_query($con, "UPDATE `tblcard` SET `Name`='$NAME',`Price`='$PRICE',`Image`='$img_des' WHERE Id = '$ID' ");
        header("location:add-car.php");


    }
    ?> -->
    <!-- <?php
    if (isset($_POST['update'])) {
        // include 'connect.php'; // Assuming your connection is in 'connect.php'
    
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        echo "hellooooo";
        $NAME = mysqli_real_escape_string($conn, $_POST['name']);
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
    ?> -->

</article>

</html>