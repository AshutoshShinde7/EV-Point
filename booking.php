<?php

session_start();

include 'connect.php';

if (isset($_POST['submit'])) {

    $fname = $_POST['f-name'];
    $lname = $_POST['l-name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $cname = $_POST['car-name'];
    if (empty($fname) || empty($lname) || empty($email) || empty($contact) || empty($gender) || empty($date) || empty($cname)) {
        die("Error: All fields are required.");
    } else {
        $insert = "INSERT INTO `booking_details` (`First Name`, `Last Name`, `Email`, `Contact`, `Gender`, `Booking Date`, `Car Name`) VALUES ('$fname', '$lname', '$email', '$contact', '$gender', '$date', '$cname')";
        mysqli_query($conn, $insert);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Booking Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'> -->
    <!-- <script src='main.js'></script> -->
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
</head>

<body>
    <div class="form-container">
        <form method="post" action="index.php">
            <h2>Book Your Test drive</h2>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            ?>
            <input type="text" name="f-name" placeholder="Enter Your First Name">
            <input type="text" name="l-name" placeholder="Enter Your Last Name">
            <input type="email" name="email" placeholder="Enter Your Email">
            <input type="number" name="contact" placeholder="Enter Your Contact No.">
            <label for="date">Select Gneder : </label>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="date">Book the date : </label>
            <input type="date" name="date">
            <input type="text" name="car-name" placeholder="Enter the car name that you wanna Test Drive">
            <input type="submit" name="submit" value="Book now" class="form-btn">
    </div>
</body>

</html>