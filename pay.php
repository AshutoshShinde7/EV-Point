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
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        footer {
            padding-top: 30px;
            display: flex;
            justify-content: space-evenly;
            /* background: #f5e6da; */
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

        .receipt {
            width: 500px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .receipt h1 {
            font-size: 2rem;
        }

        .receipt h1,
        .receipt h2 {
            text-align: center;
        }

        .receipt .details div {
            /* max-width: 100%; */
            display: flex;
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
    <section>
        <div class="receipt">
            <h1>EVPoint</h1>
            <h2>Receipt</h2>
            <?php
            if (isset($_GET['id'])) {
                $i_id = $_GET['id'];
                
                $sql = "SELECT * FROM parts_sells WHERE ID = '$i_id'";
                // echo $i_id;
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($result);
            }
            ?>
            <div class="details">
                <div>
                    <span>Date:</span>
                    <span>
                        <?php echo $data['Date']; ?>
                    </span>
                </div>
                <div>
                    <span>Receipt No:</span>
                    <span>
                        <?php echo $i_id; ?>
                    </span>
                </div>
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
                            <td>
                                <?php echo $data['Part Name']; ?>
                            </td>
                            <td>
                                <?php echo $data['Quantity']; ?>
                            </td>
                            <td>₹
                                <?php echo $data['Part Price']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total">
                <strong>Total:</strong> ₹
                <?php echo $data['Total']; ?>
            </div>
        </div>
    </section>
    <footer>
        <div>
            <a href="index.php" class="form-btn">Go to Home Page</a>
        </div>
    </footer>

</body>

</html>