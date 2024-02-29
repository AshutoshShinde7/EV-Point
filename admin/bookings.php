<link rel="stylesheet" href="admin.css">
<style>
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
      <h2>Test Drive Booking Details</h2>
      <a href="admin.php" class="form-btn">Back</a>
   </div>
   <?php
   include '../connect.php';
   $query = "SELECT * FROM booking_details";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) > 0) {
      echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Gender</th>
            <th>Booking Date</th>
            <th>Car Name</th>
            <th>Address</th>
        </tr>";

      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['First Name']}</td>
            <td>{$row['Last Name']}</td>
            <td>{$row['Email']}</td>
            <td>{$row['Contact']}</td>
            <td>{$row['Gender']}</td>
            <td>{$row['Booking Date']}</td>
            <td>{$row['Car Name']}</td>
            <td>{$row['Address']}</td>
        </tr>";
      }

      echo "</table>";
   } else {
      echo "No records found";
   }
   ?>
</section>