<link rel="stylesheet" href="admin.css">
<style>
   table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
   }

   /* table,
   th,
   td {
      border: 1px solid #ddd;
   } */

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
      <h2>Parts Sells Details</h2>
      <a href="admin.php" class="form-btn">Back</a>
   </div>
   <?php
   include '../connect.php';
   $query = "SELECT * FROM parts_sells";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) > 0) {
      echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Part Name</th>
            <th>Part Price</th>
            <th>Quantity</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Date</th>
        </tr>";

      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Part Name']}</td>
            <td>{$row['Part Price']}</td>
            <td>{$row['Quantity']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Contact']}</td>
            <td>{$row['Address']}</td>
            <td>{$row['Date']}</td>
        </tr>";
      }

      echo "</table>";
   } else {
      echo "No records found";
   }
   ?>
</section>