<?php
include('../mymethods.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 3px rgba(0, 123, 255, 0.5);
        }

        /* Button Styling */
        .btn {
            padding: 8px 12px; /* Smaller size */
            font-size: 12px; /* Reduced font size */
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.2s ease-in-out;
        }

        .btn.cancel {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }

    </style>
</head>
<body>
    <?php
    if (isset($_GET['reg_id'])) {
        $reg_id = $_GET['reg_id'];
        $res = getUserData($reg_id);
        $row = $res->fetch_assoc();
        // Fetch data from the database using $reg_id
        // Example: SELECT * FROM users WHERE reg_id = $reg_id
        //echo "Editing data for User ID: " . htmlspecialchars($reg_id);
        
    }
    

    ?>
    <div class="container">
        <h1>Change Profile Data</h1>
        <form action="/update-profile" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" value="<?php echo $row['username'];?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $row['email'];?>">
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="contact" placeholder="Enter your contact number" value="<?php echo $row['contact'];?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your new password" value="<?php echo $row['password'];?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Save Changes</button>
                <button type="button" class="btn cancel">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
