<?php
session_start();
include 'connect.php';
if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $u_name = mysqli_real_escape_string($conn, $_POST['user_name']);
   $contact = $_POST['contact'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   $user_type = $_POST['user_type'];
   $select = " SELECT * FROM users WHERE Email = '$email' &&  `Password` = '$pass' && user_name = '$u_name' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users(`Name`, user_name, Email, Contact , `Password`, user_type) VALUES('$name','$u_name','$email','$contact','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin/admin.css">
</head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your Name">
      <input type="text" name="user_name" required placeholder="Enter a User Name">
      <input type="email" name="email" required placeholder="Enter your Email">
      <input type="number" name="contact" required placeholder="Enter your Contact Number">
      <input type="password" name="password" required placeholder="Enter your Password">
      <input type="password" name="cpassword" required placeholder="Confirm your Password">
      <select  name="user_type" hidden>
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>
</div>
</body>
</html>