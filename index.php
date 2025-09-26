<!-- 
********************************************************************
*                    Login User                                    *
********************************************************************
 -->
<?php

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    $errors = [];
    if(isset($_SESSION['login_error'])){
        $errors['login'] = $_SESSION['login_error'];
    }
    else{
        $errors['login'] = '';
    }

    unset($_SESSION['login_error']);

    function show_error($error){
        if(!empty($error)){
            return "<p class = 'error-message'>" . htmlspecialchars($error) . "</p>";
        }
        else{
            return '';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="form-box" id="login-form">
            <form action="login_register.php" method="post">
                <h1 id="login-heading">Login</h1>           
                <input type="email" id="email" name="email" placeholder="Email">
                <input type="password" id="password" name="password" placeholder="Password">
                <?= show_error($errors['login']);  ?>
                <button type="submit" class="login-button" name="login">Login</button>
                <p class="new-login-link">Don't have an account? <a href="register.php" class="login-register">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>