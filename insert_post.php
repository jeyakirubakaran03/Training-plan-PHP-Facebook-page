<?php
// **********************************************
// *                 Insert Post                *
// **********************************************

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "database.php";

if(!isset($_SESSION['user_id'])){
    echo "<script> alert('You must log in first!'); window.location.href='index.php'; </script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['user_id'];
    $post_content = trim($_POST['post_content']);
    $post_content = htmlspecialchars($post_content);

    if(!empty($post_content)){
        $stmt = $conn->prepare("INSERT INTO tWall
                                (user_id, post,posting_date)
                                VALUES
                                (?,?,NOW())");
        $stmt->bind_param("is", $user_id, $post_content);
        if($stmt->execute()){
            echo json_encode(["status" => "success", "message" => "Post added"]);
        }
        else{
            echo json_encode(["status" => "error", "message" => "Failed to add post"]);
        }
        $stmt->close();
    }
    else{
        echo json_encode(["status" => "error", "message" => "Post cannot be empty"]);
    }
    $conn->close();
}

?>