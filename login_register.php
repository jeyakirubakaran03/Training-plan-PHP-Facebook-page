<?php

session_start();
require_once "database.php";

// ********************** Register **********************

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if(empty($name) || empty($email) || empty($password) || empty($address) || empty($phone)){
        $_SESSION['register_error'] = 'All fields are required';
        header('Location: register.php');
        exit();
    }

    $check = $conn->query("SELECT *
                            FROM tUser
                            WHERE email_id = '$email'");
    if($check->num_rows > 0){
        $_SESSION['register_error'] = "Email ID already Exist..!";
        header("Location: register.php");
        exit();
    }

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tUser
                            (name, email_id, password, address, phone)
                            VALUES
                            (?,?,?,?,?)");
    
    $stmt->bind_param('sssss',$name, $email, $hash_password, $address, $phone);

    if($stmt->execute()){
        echo "<script>alert('Registration Successful!'); window.location.href='index.php';</script>";
        exit();
    }
    else{
        $_SESSION['register_error'] = "Something went wrong...!";
        header('Location: register.php');
        exit();
    }
}

// ************************ Login **************************

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * 
                            FROM tUser
                            WHERE email_id = '$email'");
    
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            header("Location: home.php");
            exit();
        }
    }
    $_SESSION['login_error'] = 'Incorrect Email or Password';
    header("Location: index.php");
    exit();
}

?>