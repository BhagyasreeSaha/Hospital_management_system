<?php
include("../mymethods.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management Login</title>
    <style>
        /* General Reset */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(to bottom, #66b3ff, #3399ff);
    color: #fff;
}

/* Container for Login */
.login-container {
    background: #fff;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 350px;
}

.login-container h1 {
    margin-bottom: 20px;
    font-size: 18px;
    color: #333;
}

.logo img {
    width: 100px;
    margin-bottom: 20px;
}

/* Form Styles */
.login-form {
    display: flex;
    flex-direction: column;
}

.login-form input {
    margin: 10px 0;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

.login-form button {
    padding: 10px;
    background-color: #3399ff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-form button:hover {
    background-color: #267acc;
}

/* Footer */
footer {
    margin-top: 20px;
    font-size: 12px;
    color: #666;
}

    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="img/favicon.png" alt="Hospital Logo">
        </div>
        <h1>Welcome to Hospital Management System</h1>
        <form class="login-form" action="" method="post">
            <input type="text" placeholder="email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit" name="submit">Log In</button>
        </form>
        <footer>
            <p>Contact us: support@hospital.com | +1 234 567 890</p>
            <p>if you have not an account <a href="registration.php">click here</a></p>
        </footer>
    </div>
    <?php
                if(isset($_POST['submit']))
                {
                    $response = logInUser($_POST);
                    
                    echo $response->num_rows;

                    
                     if ($response->num_rows >0) 
                        {
                            session_start();
                            $_SESSION['email'] = $_POST['email'];
                            $_SESSION['type'] = 'user';
                            header('location:index.php');
                        }
                        else
                        {
                            echo "error";
                        }
                }
                
            ?>
</body>
</html>
