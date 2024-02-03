<?php

session_start();

include 'connect.php';

if (isset($_POST['submit'])) {
    
    // $productId = $_POST['ID'];
    $pname = $_POST['p-name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    if (empty($pname) || empty($price) || empty($email) || empty($contact) || empty($quantity) || empty($name) || empty($address) || is_int($quantity)) {
        die("Error: All fields are required.");
    }else {
        $insert = "INSERT INTO `parts_sells` (`Part Name`, `Part Price`, `Quantity`, `Email`, `Name`, `Contact`, `Address`) VALUES ('$pname', '$price', '$quantity', '$email', '$name', '$contact', '$address')";
        mysqli_query($conn, $insert);
        header('Location:index.php');
    }

}
?>
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

        .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            background: #f5e6da;
        }

        .form-container form {
            padding: 50px;
            border-radius: 20px;
            box-shadow: var(--box-shadow);
            background: #fff;
            text-align: center;
            width: 550px;
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
    </style>
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
            <input type="text" name="p-name" class="box" required placeholder="Enter the Part Name">
            <input type="number" name="price" class="box" required placeholder="Enter a Price">
            <input type="number" name="quantity" required placeholder="Enter the Quantity" class="box">
            <input type="text" name="name" required placeholder="Enter your Name" class="box">
            <input type="email" name="email" placeholder="Enter your Email" required class="box">
            <input type="number" name="contact" required placeholder="Enter your Contact Number" class="box">
            <input type="text" name="address" required placeholder="Enter your Address" class="box">
            <input type="submit" name="submit" value="Pay Now" class="form-btn">
        </form>

    </div>