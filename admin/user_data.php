<link rel="stylesheet" href="admin.css">
<style>
   h2 {
      color: #333;
   }

   table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
   }

   th,
   td {
      padding: 10px;
      text-align: left;
   }

   th {
      background-color: #ffa500;
      color: white;
   }

   section div {
      margin-top: 20px;
      display: flex;
      justify-content: space-around;
   }

   section div a {
      background: var(--main-color);
      color: var(--bg-color);
      text-transform: capitalize;
      font-size: 20px;
      cursor: pointer;
      padding: 10px;
      border-radius: 10px;
   }

   section div a:hover {
      background: #f1b545;
      color: #fff;
   }
</style>
<section>
<div>
      <h2>All Users and Admin</h2>
      <a href="admin.php" class="form-btn">Back</a>
   </div>
   <?php
   
   include '../connect.php';
   if (mysqli_connect_errno()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
   }

   $srno = 0;
   $query = "SELECT * FROM users";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
      $srno++;
      echo "<table border='1'>
        <tr>
            <th>Sr No.</th>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Contact</th>
            <th>User Type</th>
        </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>" . $srno++ . "</td>
            <td>{$row['ID']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['Email']}</td>            
            <td>{$row['Contact']}</td>
            <td>{$row['user_type']}</td>
        </tr>";
      }
      echo "</table>";
   } else {
      echo "No records found";
   }
   ?>
   <div>
      <h2>User Details</h2>
      <!-- <a href="admin.php" class="form-btn">Back</a> -->
   </div>
   <?php
   $srno = 0;
   $query = "SELECT * FROM users WHERE user_type = 'user'";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
      $srno++;
      echo "<table border='1'>
        <tr>
            <th>Sr No.</th>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Contact</th>
            <th>User Type</th>
        </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>" . $srno++ . "</td>
            <td>{$row['ID']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['Email']}</td>
            <td>{$row['Contact']}</td>
            <td>{$row['user_type']}</td>
        </tr>";
      }
      echo "</table>";
   } else {
      echo "No records found";
   }
   ?>
   <div>
      <h2>Admin Details</h2>
      <!-- <a href="admin.php" class="form-btn">Back</a> -->
   </div>
   <?php
   $srno = 0;
   $query = "SELECT * FROM users WHERE user_type = 'admin'";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
      $srno++;
      echo "<table border='1'>
        <tr>
            <th>Sr No.</th>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Contact</th>
            <th>User Type</th>
        </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>" . $srno++ . "</td>
            <td>{$row['ID']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['Email']}</td>            
            <td>{$row['Contact']}</td>
            <td>{$row['user_type']}</td>
        </tr>";
      }
      echo "</table>";
   } else {
      echo "No records found";
   }
   ?>
</section>