<?php
include('methods.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Test Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            resize: none;
            height: 100px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
        }

        .submit-btn:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Lab Test Form</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="test-name">Test Name:</label>
                <input type="text" id="test-name" name="test_name" placeholder="Enter test name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" placeholder="Enter price" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter description" required></textarea>
            </div>
            <button type="submit" class="submit-btn" name="submit">Submit</button>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                $res=labTestinsert($_POST);
                if($res==1)
                {
                    echo "success";
                    header('location:labTestinsert.php');
                }
                else{
                    alert("labtest can not be inserted");
                }
            }

            
        ?>
    </div>
</body>
</html>
