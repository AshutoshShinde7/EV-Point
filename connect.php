<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "conn";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        $_SESSION['alert_message'] = "Something went wrong!!!";
    }