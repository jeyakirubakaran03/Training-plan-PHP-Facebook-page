<?php

// ****************************************************
// *              Fetch User Profile details          *
// ****************************************************
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once "database.php";

if(!isset($_SESSION['user_id'])){
    echo "<script>alert('You must log in first!'); window.location.href='index.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT 
                        name, email_id, address, phone
                        FROM tUser 
                        where user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

?>