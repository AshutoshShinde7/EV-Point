<?php

include 'connect.php';

session_start();

if (isset($_POST['submit'])) {
   
   $uname = $_POST['user_name'];
   $pass = $_POST['password'];
   
   $select = " SELECT * FROM users WHERE user_name = '$uname' AND Password = '$pass'";
   $result = mysqli_query($conn, $select);
   if (mysqli_num_rows($result) > 0) {
      
      $_SESSION['logged_in'] = true;
      
      $row = mysqli_fetch_assoc($result);
      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['user_name'];
         header('Location:admin/admin.php');

      } elseif ($row['user_type'] == 'user') {
         $_SESSION['user_id'] = $row['ID'];
         $_SESSION['user_name'] = $row['user_name'];
         header('location: index.php');

      }

   } else {
      $error[] = 'incorrect User Name or password!';
   }

}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin/admin.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>login now</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
            ;
         }
         ;
         ?>
         <input type="text" name="user_name" required placeholder="Enter your User Name">
         <input type="password" name="password" required placeholder="Enter your Password">
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>don't have an account? <a href="register.php">register now</a></p>
      </form>

   </div>

</body>

</html>