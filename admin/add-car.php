<link rel="stylesheet" href="admin.css">
<style>
   .con {
      padding-bottom: 50px;
   }
   h2 {
      text-align: center;
      color: #333;
   }

   table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      background: var(--bg-color);
      box-shadow:  0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      border-radius: 10px;
   }

   table,
   table th,
   table td {
      border: 1px solid #ddd;
   }

   table th,
   table td {
      /* padding: 10px; */
      text-align: center;
   }

   table th {
      background-color: #ffa500;
      color: white;
   }

   .box-img {
      height: 250px;
      width: 250px;
      aspect-ratio: 3/2;
      object-fit: contain;
   }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
   integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
   #add_car header {
      padding-top: 30px;
      display: flex;
      justify-content: space-evenly;
      background: #f5e6da;
      /* border: 2px solid red; */
   }

   :root {
      --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      --main-color: #ffa500;
      --bg-color: #fff;
   }

   .form-containerc{
      max-height: 1000px
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
</style>
<section id="add_car">
   <header>
      <h1>Add New Car</h1>
      <div>
         <a href="admin.php" class="form-btn">Back</a>
      </div>
   </header>
   <div class="form-container">
      <form action="process.php" method="post" enctype="multipart/form-data">
         <div class="form-elemnt my-4">
            <label for="image">Add Car Image :</label>
            <input type="file" name="image" id="image" accept="image/*" required>
         </div>
         <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="title" placeholder="Name of the Car">
         </div>
         <div class="form-elemnt my-4">
            <input type="number" class="form-control" name="price" placeholder="Price of the Car">
         </div>
         <div class="form-elemnt my-4">
            <input type="number" class="form-control" name="year" placeholder="Model Year">
         </div>
         <div class="form-elemnt my-4">
            <select name="Transmission" id="" class="form-control">
               <option name="auto" value="Automatic">Automatic</option>
               <option name="manual" value="Manual">Manual</option>
            </select>
         </div>
         <div class="form-elemnt my-4">
            <select name="type" id="" class="form-control">
               <option name="ev" value="Electric">Electric</option>
               <option name="hy" value="Hybrid">Hybrid</option>
            </select>
         </div>
         <div class="form-elemnt my-4">
            <input type="number" class="form-control" name="speed" placeholder="Top Speed">
         </div>

         <div class="">
            <input type="submit" name="create" value="Add Car" class="form-btn">
         </div>
      </form>

   </div>
</section>
<section style="background: #f5e6da;">
   <?php
   include '../connect.php';
   ?>
   <!-- <section>
      <h2>Admin Page - User Data</h2>
      upload.php

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
         $targetDirectory = "uploads/"; // Create an "uploads" directory in your project
         $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
         $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

         // Check if the file is an actual image
         if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
               $uploadOk = 1;
            } else {
               echo "File is not an image.";
               $uploadOk = 0;
            }
         }

         // Check if file already exists
         if (file_exists($targetFile)) {
            echo "Sorry, the file already exists.";
            $uploadOk = 0;
         }

         // Check file size
         if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
         }

         // Allow only certain file formats
         $allowedFormats = ["jpg", "jpeg", "png", "gif"];
         if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
         }

         // Check if $uploadOk is set to 0 by an error
         if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
         } else {
            // Move the file to the uploads directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
               echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
               // You can now use $targetFile to store the path of the uploaded image in your database or use it elsewhere.
            } else {
               echo "Sorry, there was an error uploading your file.";
            }
         }
      }
      ?>

      <?php

      session_start();
      include '../connect.php';

      // Check if the connection is successful
      if (mysqli_connect_errno()) {
         die("Failed to connect to MySQL: " . mysqli_connect_error());
      }
      // Retrieve user data from the database
      $query = "SELECT * FROM cars";
      $result = mysqli_query($conn, $query);

      // Check if there is data
      if (mysqli_num_rows($result) > 0) {
         echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Car Name</th>
            <th>Image</th>
        </tr>";

         // Output data of each row
         while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Title']}</td>
            <td><img class='box-img' src='../img/" . basename($row['Image']) . "' alt='Car Image'><br></td>
        </tr>";
         }

         echo "</table>";
      } else {
         echo "No records found";
      }


      mysqli_close($conn);
      ?>
   </section> -->
   <div class="con">
      <header class="d-flex align-items-center justify-content-evenly ">
         <h1>Car List</h1>
         <a href="#add_car" class="form-btn mb-4">Add New Car</a>
      </header>
      <?php
      if (isset($_SESSION["create"])) {
         ?>
         <div class="alert alert-success">
            <?php
            echo $_SESSION["create"];
            ?>
         </div>
         <?php
         unset($_SESSION["create"]);
      }
      ?>
      <?php
      if (isset($_SESSION["update"])) {
         ?>
         <div class="alert alert-success">
            <?php
            echo $_SESSION["update"];
            ?>
         </div>
         <?php
         unset($_SESSION["update"]);
      }
      ?>
      <?php
      if (isset($_SESSION["delete"])) {
         ?>
         <div class="alert alert-success">
            <?php
            echo $_SESSION["delete"];
            ?>
         </div>
         <?php
         unset($_SESSION["delete"]);
      }
      ?>

      <table border='1'>
         <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Buttons</th>
         </tr>
         <?php
         include('../connect.php');
         $sqlSelect = "SELECT * FROM cars";
         $result = mysqli_query($conn, $sqlSelect);
         while ($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
               <td>
                  <?php echo $data['ID']; ?>
               </td>
               <td>
                  <?php echo $data['Title']; ?>
               </td>
               <td>
                  <?php echo $data['Price']; ?> Lakh
               </td>
               <td>
                  <?php echo "<img class='box-img' src='../img/" . basename($data['Image']) . "' alt='Car Image'><br>" ?>
               </td>
               <td>
                  <a href="edit.php?id=<?php echo $data['ID']; ?>" class="btn btn-warning">Edit</a>
                  <a href="delete.php?id=<?php echo $data['ID']; ?>" class="btn btn-danger">Delete</a>
               </td>
            </tr>
            <?php
         }
         ?>
      </table>
   </div>
</section>