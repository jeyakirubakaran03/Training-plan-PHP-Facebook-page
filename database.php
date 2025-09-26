<?php

// **********************************************
// *              Database Connection           *
// **********************************************

$db_server = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "facebook_db";

$conn = new mysqli ($db_server, $db_user, $db_pass, $db_name);

if($conn->connect_server){
    die("Connection Failed..!" . $conn->connect_server);
}
?>