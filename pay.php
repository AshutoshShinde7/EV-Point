<?php

session_start();

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Receipt</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    .receipt {
        width: 300px;
        margin: 0 auto;
        border: 1px solid #ccc;
        padding: 20px;
    }

    .receipt h1,
    .receipt h2 {
        text-align: center;
    }

    .receipt .details {
        margin-bottom: 10px;
    }

    .receipt .details span {
        display: inline-block;
        width: 50%;
    }

    .receipt .items {
        margin-bottom: 10px;
    }

    .receipt .items table {
        width: 100%;
        border-collapse: collapse;
    }

    .receipt .items table th,
    .receipt .items table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .receipt .total {
        text-align: right;
    }
</style>
</head>
<body>

<div class="receipt">
    <h1>EVPoint</h1>
    <h2>Receipt</h2>
    <?php
    if (isset($_GET['id'])) {
        $pid = $_GET['id'];

        $sql = "SELECT * FROM parts_sells WHERE ID = '$pid'";

        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
    }
?>
    <div class="details">
        <span>Date:</span>
        <span><?php $data['Date'] ?></span>
    </div>
    <div class="details">
        <span>Receipt No:</span>
        <span>123456</span>
    </div>
    <div class="items">
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>2</td>
                    <td>$20.00</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>1</td>
                    <td>$15.00</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="total">
        <strong>Total:</strong> $55.00
    </div>
</div>

</body>
</html>
