<?php
//session_start();
include('header.php');
if (isset($_SESSION['doc_email']) && $_SESSION['type'] == 'doctor') {
    $doc_id = $_SESSION['doc_id']; // Access the doc_id from the session
}

include('../admin/methods.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management - Doctors</title>
    <style>
        /*nav {
            background-color: white;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo img {
            width: 50px;
            height: auto;
        }
        .navbar-links {
            display: flex;
            gap: 20px;
        }
        .navbar-links a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 4px;
        }
        .navbar-links a:hover {
            background-color: #f1f1f1;
        }*/
        
        header {
            color: blue;
            text-align: center;
            padding: 1rem;
        }
        .container {
            margin: 20px auto;
            max-width: 900px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .appointment {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .appointment:last-child {
            border-bottom: none;
        }
        .appointment-info {
            flex: 1;
        }
        .appointment-actions {
            display: flex;
            gap: 10px;
        }
        button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }
        .confirm {
            background-color: #28a745;
        }
        .cancel {
            background-color: #dc3545;
        }
        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
<!--<nav>
        <div class="navbar">
            <div class="logo">
                
                <img src="img/favicon.png" alt="Hospital Logo">
            </div>
            <div class="navbar-links">
                <a href="index.php">Home</a>
                <a href="#">Doctors</a>
                <a href="#">Appointments</a>
                <a href="#">Contact</a>
            </div>
        </div>
    </nav>-->
    <header>
        <h1>your appointments</h1>
    </header>
    <div class="container">
    <input name="doc_id" type="text" value="<?php echo htmlspecialchars($doc_id); ?>">
    <?php
    $result = displayAppointment();

    if ($result && $result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="appointment">
                <div class="appointment-info">
                    <p><strong>Patient:</strong>' . htmlspecialchars($row["username"]) . '</p>
                    <p><strong>Date:</strong>' . htmlspecialchars($row["appointment_date"]) . '</p>
                    <p><strong>Time:</strong>' . htmlspecialchars($row["appointment_time"]) . '</p>
                    <p><strong>Message:</strong>' . htmlspecialchars($row["appointment_message"]) . '</p>
                </div>
                <div class="appointment-actions">';
                if($row['appointment_status']=="Pending"){
                    echo '
                    <button class="confirm"onclick="confirmAppointment('. htmlspecialchars($row["appointment_id"]) . ')">Confirm</button>
                    <button class="cancel">Cancel</button>
                    ';
                }
                else
                {
                    echo $row['appointment_status'];
                }
                
                echo ' </div>
            </div>';
        }
    }
    else {
        echo '<p>No appointments found.</p>';
    }
 
?>
       
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
     function confirmAppointment(appointment_id) 
        {
            // alert(id)
        if( confirm("Are you sure to confirm the appointment?"))
        {
            $.ajax({
                        url:"confirmAppointment.php",
                        method:"get",
                        data:{"appointment_id":appointment_id},
                        success: function(response)
                            {
                                alert(response);
                                window.location.href = "";
                            }
                    })
        }
        }
</script>
</body>
</html>
