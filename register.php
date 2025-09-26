<!-- 
    *********************************************************
    *                   Register User                       *
    *********************************************************
 -->

 <?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }  
    $errors = [];

    if(isset($_SESSION['register_error'])){
        $errors['register'] = $_SESSION['register_error'];
    }
    else{
        $errors['register'] = '';
    }

    unset($_SESSION['register_error']);

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
    <title>Register Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="form-box" id="login-form">
            <form action="login_register.php" method="post">
                <h1 id="login-heading">Register</h1>
                <input type="text" id="name" name="name" placeholder="Name">
                <input type="email" id="email" name="email" placeholder="Email">
                <input type="password" id="password" name="password" placeholder="Password">
                <input type="text" id="address" name="address" placeholder="Address">
                <input type="text" id="phone" name="phone" placeholder="Phone">

                <?= show_error($errors['register']); ?>
                <button type="submit" class="login-button" name="register">Register</button>
                <p class="new-login-link">Already an User? <a href="index.php" class="login-register">Login</a> </p>
            </form>
        </div>
    </div>
</body>
</html>