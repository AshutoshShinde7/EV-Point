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
   .box-img {
      height: 150px;
      width: 150px;
      aspect-ratio: 3/2;
      object-fit: contain;
   }
</style>
<section>

   <div>
      <h2>Parts Details</h2>
      <a href="admin.php" class="form-btn">Back</a>
   </div>
   <?php
   include '../connect.php';
   if (mysqli_connect_errno()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
   }
   $query = "SELECT * FROM parts";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
      echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Part Name</th>
            <th>Price</th>
            <th>Quabtity</th>
            <th>Image</th>
        </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['p_name']}</td>
            <td>{$row['p_price']}</td>
            <td>{$row['p_quantity']}</td>
            <td><img class='box-img' src='../img/" . basename($row['Image']) . "' alt='Car Image'><br></td>
        </tr>";
      }
      echo "</table>";
   } else {
      echo "No records found";
   } 
   ?>
</section>