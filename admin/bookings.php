<link rel="stylesheet" href="admin.css">
<style>
   table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
   }

   table,
   th,
   td {
      border: 1px solid #ddd;
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
        </tr>";

      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['First Name']}</td>
            <td>{$row['Last Name']}</td>
            <td>{$row['Email']}</td>
        </tr>";
      }

      echo "</table>";
   } else {
      echo "No records found";
   }
   ?>
</section>