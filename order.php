<?php

session_start();

include 'connect.php';

if (isset($_GET['id']) && isset($_GET['quantity'])) {
    $id = $_GET['id'];
    $pquantity = $_GET['quantity'];
    echo "Quantity: $pquantity";

    $sql = "SELECT * FROM parts WHERE ID = '$id'";

    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $pname = $data['p_name'];
    $pprice = $data['p_price'];
    // $pquantity = $data['p_quantity'];
    $dcharge = 50;
    $pimg = $data['Image'];
} else {
    echo "No Product found";
}

if (isset($_POST['submit'])) {
    // $pquantity = $_POST['quantity'];
    // $pquantity = $_SESSION['quantity'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    if (empty($email) || empty($contact) || empty($name) || empty($address)) {
        die("Error: All fields are required.");
    } else {
        $insert = "INSERT INTO `parts_sells` (`Part Name`, `Part Price`, `Quantity`, `Email`, `Name`, `Contact`, `Address`) VALUES ('$pname', '$pprice', '$quantity', '$email', '$name', '$contact', '$address')";
        mysqli_query($conn, $insert);
        header('Location:index.php');
    }
}

$tprice = $pprice + $dcharge;
// $tprice = $tprice * $pquantity;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Order</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='order.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        * {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        :root {
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            --main-color: #ffa500;
            --bg-color: #fff;
        }

        .sec .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            background: #f5e6da;
        }

        .sec .form-container form {
            padding: 50px;
            border-radius: 20px;
            box-shadow: var(--box-shadow);
            background: #fff;
            text-align: center;
            max-width: 550px;
        }

        .sec .form-container form h2 {
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
        }

        .sec .form-container form input,
        .sec .form-container form select {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
        }

        .sec .form-container form select option {
            background: #fff;
        }

        .sec .form-container form .form-btn {
            background: var(--main-color);
            color: var(--bg-color);
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
        }

        .sec .form-container form .form-btn:hover {
            background: #f1b545;
            color: #fff;
        }

        .sec .form-container form .error-msg {
            margin: 10px 0;
            display: block;
            background: rgb(249, 154, 173);
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- <?php echo $pquantity; ?> -->
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <h2 class="text-center p-2 text-primary">Fill the details to complete your order</h2>
                <h3>Product Deatails</h3>
                <table class="table table-bordered" width="" 500px>
                    <tr>
                        <th>Product Name : </th>
                        <td>
                            <?php echo $pname; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Product Price : </th>
                        <td>₹
                            <?php echo $pprice; ?>
                        </td>
                    </tr>
                    <!-- <tr>
                        <th>Product Quantity : </th>
                        <td><?php echo $pquantity; ?></td>
                    </tr> -->
                    <tr>
                        <th>Delivery Charge : </th>
                        <td>₹
                            <?php echo $dcharge; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Amount to Pay : </th>
                        <td>₹
                            <?php echo $tprice; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    <section class="sec">
        <div class="form-container">
            <span class="fas fa-times" id="close-login-form"></span>
            <form action="" method="post">
                <h3>Buy Now</h3>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    }
                    ;
                }
                ;
                ?>
                <!-- <input type="number" name="quantity" required placeholder="Enter the Quantity" class="box"> -->
                <input type="text" name="name" required placeholder="Enter your Name" class="box">
                <input type="email" name="email" placeholder="Enter your Email" required class="box">
                <input type="number" name="contact" required placeholder="Enter your Contact Number" class="box">
                <input type="text" name="address" required placeholder="Enter your Address" class="box">
                <input type="submit" name="submit" value="Pay Now" class="form-btn">
            </form>
        </div>
    </section>
</body>

</html>