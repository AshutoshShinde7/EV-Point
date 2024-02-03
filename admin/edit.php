<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit CAR</title>
</head>

<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Car</h1>
            <div>
                <a href="admin.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="add-car.php" method="post" enctype="multipart/form-data">
            <?php

            if (isset($_GET['id'])) {
                include("../connect.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM cars WHERE ID=$id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="title" placeholder="Car Name :"
                        value="<?php echo $row["Title"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <input type="number" class="form-control" name="price" placeholder="Car Price :"
                        value="<?php echo $row["Price"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <input type="file" class="form-control" name="image" placeholder="Car Image :"
                        value="<?php echo $row["Image"]; ?>">
                </div>
                <div class="form-element my-4">
                    <input type="submit" name="edit" value="Edit Car" class="btn btn-primary">
                </div>
                <?php
            } else {
                echo "<h3>Car Does Not Exist</h3>";
            }
            ?>

        </form>


    </div>
</body>

</html>