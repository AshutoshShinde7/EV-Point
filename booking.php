<?php

session_start();

include 'connect.php';

$uid = $_SESSION['user_id'];
// echo $uid;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cars WHERE ID = '$id'";

    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $cname = $data['Title'];

} else {
    $_SESSION['alert_message'] = "Error: Car not Found.";
}

if (isset($_POST['submit'])) {

    $fname = mysqli_real_escape_string($conn, $_POST['f-name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $cname = mysqli_real_escape_string($conn, $_POST['car-name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    if (empty($fname) || empty($email) || empty($contact) || empty($date) || empty($cname) || empty($address)) {
        $_SESSION['alert_message'] = "Error: All fields are required.";
    } else {
        $insert = $conn->prepare("INSERT INTO `booking_details` (`First Name`, `Email`, `Contact`, `Gender`, `Booking Date`, `Car Name`, `Address`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->bind_param("sssssss", $fname, $email, $contact, $gender, $date, $cname, $address);
        if ($insert->execute()) {
            $_SESSION['alert_message'] = "Booking successful!";
        } else {
            $_SESSION['alert_message'] = "Error: Unable to process booking.";
        }
        $insert->close();
    }

    header('location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Booking Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
        <form method="post">
            <h2>Book Your Test drive</h2>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            $get = "SELECT * FROM users WHERE ID = '$uid'";
            $result = mysqli_query($conn, $get);
            $data = mysqli_fetch_array($result);

            ?>
            <input type="text" name="f-name" value="<?php echo $data['Name']; ?>">
            <!-- <input type="text" name="l-name" placeholder="Enter Your Last Name"> -->
            <input type="email" name="email" value="<?php echo $data['Email']; ?>" >
            <input type="number" name="contact" value="<?php echo $data['Contact']; ?>">
            <label for="gender">Select Gneder : </label>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="date">Book the date : </label>
            <input type="date" name="date">
            <input type="text" name="car-name" value="<?php echo $cname; ?>" readonly>
            <textarea type="text" name="address" rows="3" class="text-box" placeholder="Enter Your Address"></textarea><br>
            <input type="submit" name="submit" value="Book now" class="form-btn">
    </div>
</body>

</html>