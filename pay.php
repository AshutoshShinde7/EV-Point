<?php

// $pname = $_POST['p_name'];
// $pprice = $_POST['p_price'];
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];

include 'C:\xampp\htdocs\new1\Instamojo\Instamojo.php';

$authType = "app/user"; /**Depend on app or user based authentication**/

$api = Instamojo\Instamojo::init($authType,[
        "client_id" =>  'XXXXXQAZ',
        "client_secret" => 'XXXXQWE',
        "username" => 'FOO', /** In case of user based authentication**/
        "password" => 'XXXXXXXX' /** In case of user based authentication**/

    ],true); /** true for sandbox enviorment**/

?>