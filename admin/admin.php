<?php

include '../connect.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <!-- custom css file link  -->
   <style>
      .base .container content .button .log a{
         background: crimson;
      }
      </style>
      <link rel="stylesheet" href="admin.css">
</head>

<body>
   <section class="base">
      <div class="container">
         <div class="content">
            <h2>hi, <span>admin</span></h2>
            <h1>welcome <span>
                  <?php echo $_SESSION['admin_name'] ?>
               </span></h1>
            <!-- <p>this is an admin page</p> -->
            <div class="button">
               <div class="log">
                  <a href="../login.php" class="btn">login</a>
                  <a href="../register.php" class="btn">register</a>
                  <a href="../logout.php" class="btn">logout</a>
               </div>
               <div class="operation">
                  <a href="add-car.php" class="btn">Add Cars</a>
                  <a href="add-parts.php" class="btn">Add Parts</a>
               </div>
               <div class="operation">
               <a href="user_data.php" class="btn">Users</a>
                  <a href="bookings.php" class="btn">Test Drive Bookings</a>
                  <a href="parts-sells.php" class="btn">Parts Sells</a>
                  <a href="feedback-d.php" class="btn">Feedbacks</a>
               </div>
            </div>
         </div>
      </div>
   </section>
</body>

</html>