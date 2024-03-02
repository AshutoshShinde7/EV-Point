<?php

session_start();

include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM parts WHERE ID = '$id'";

    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $pname = $data['p_name'];
    $pprice = $data['p_price'];
    $dcharge = 150;
    $pimg = $data['Image'];
    $oq = $data['p_quantity'];
} else {
    echo "No Product found";
}
$pquantity = $_POST['quantity'];
if ($pquantity > $oq) {
    $_SESSION['alert_message'] = "Apologies for any confusion, but it appears that currently, we only have $oq $pname available";
    header("Location: index.php");
}
$tprice = $pprice + $dcharge;
$t_price = $tprice * $pquantity;
// echo $t_price;
// echo $pquantity;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $pquantity = $_POST['quantity'];
    $oid = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    if (empty($email) || empty($contact) || empty($name) || empty($address)) {
        die("Error: All fields are required.");
    } else {
        // $_SESSION['alert_message'] = "ID".$oid;

        $insert = "INSERT INTO `parts_sells` (`ID`, `Part Name`, `Part Price`,`Total`, `Quantity`, `Email`, `Name`, `Contact`, `Address`) VALUES ('$oid', '$pname', '$pprice','$t_price', '$pquantity', '$email', '$name', '$contact', '$address')";
        mysqli_query($conn, $insert);

        $i_id = mysqli_insert_id($conn);

        $updateQuery = "UPDATE parts SET p_quantity = p_quantity - ? WHERE ID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ii", $pquantity, $id);
        mysqli_stmt_execute($stmt);
        header('Location:pay.php?id=' . $i_id);
        $_SESSION['alert_message'] = "Payment successful!";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Order</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        * {
            font-family: "Jost", sans-serif;
            /* font-family: sans-serif; */
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

        .order_details {
            background: #f5e6da;
        }

        .order_details h2 {
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            padding-top: 40px;
            /* margin-bottom: -80px; */
        }

        .card-info {
            /* max-height: 100vh; */
            display: flex;
            justify-content: space-evenly;
        }

        .box-img {
            width: 100%;
            height: 160px;
            object-fit: contain;
            object-position: center;
            margin-bottom: 1rem;
        }

        .amount {
            font-weight: bolder;
        }

        .card h3 {
            text-transform: uppercase;
            font-weight: bold;
        }

        .card h4 {
            font-weight: bold;
        }

        .p-info,
        .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            /* justify-content: center; */
        }

        @media (max-width: 970px) {
            .card-info {
                flex-wrap: wrap;
            }
        }

        .form-container form,
        .card-info .p-info .card {
            padding: 50px;
            border-radius: 20px;
            box-shadow: var(--box-shadow);
            background: #fff;
            text-align: center;
            max-width: 550px;
        }

        .form-container form h2 {
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
        }

        .form-container form input,
        .form-container form select {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
        }

        .form-container form select option {
            background: #fff;
        }

        .form-container form .form-btn {
            padding: 10px 15px;
            border-radius: 5px;
            width: 100%;
            background: var(--main-color);
            color: var(--bg-color);
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
        }

        .form-container form .form-btn:hover {
            background: #f1b545;
            color: #fff;
        }

        .form-container form .error-msg {
            margin: 10px 0;
            display: block;
            background: rgb(249, 154, 173);
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }

        .form-container form .text-box {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
            resize: none;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <section class="order_details">
        <h2>Fill the details to complete your order</h2>
        <div class="card-info">
            <div class="p-info">
                <div class="card">
                    <?php echo "<img class='box-img' src='img/" . basename($pimg) . "' alt='Car Image'><br>" ?>
                    <h3>
                        <?php echo $pname; ?>
                    </h3>
                    <h4>
                        ₹
                        <?php echo $pprice; ?>
                    </h4>
                    <hr>
                    <div class="pricing">
                        <div>
                            <span>Quantity:</span>
                            <?php echo $pquantity; ?>
                        </div>
                        <div>
                            <span>Delivery Charge : </span>₹
                            <?php echo $dcharge; ?>
                        </div>
                        <div class="amount">
                            <span>Amount to Pay : </span>₹
                            <?php echo $t_price; ?>
                        </div>
                    </div>
                </div>
            </div>
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
                    <input type="number" name="id" hidden>
                    <input type="number" name="quantity" value="<?php echo $pquantity; ?>" hidden>
                    <input type="text" name="name" required placeholder="Enter your Name" class="box">
                    <input type="email" name="email" placeholder="Enter your Email" required class="box">
                    <input type="number" name="contact" required placeholder="Enter your Contact Number" class="box">
                    <textarea type="text" name="address" rows="3" required placeholder="Enter your Address"
                        class="text-box"></textarea>
                    <button type="submit" name="submit" value="Pay Now" class="form-btn">Pay Now</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>