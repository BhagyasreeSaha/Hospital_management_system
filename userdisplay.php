<?php
include('header.php');
include('../admin/methods.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Management - User Page</title>
  <style>
    /* styles.css */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
  background-color: #f9f9f9;
}


.main-content {
  max-width: 800px;
  margin: 2rem auto;
  padding: 1rem;
  background: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.user-details, .appointment-details {
  margin-bottom: 2rem;
}

.info-box {
  padding: 1rem;
  border: 1px solid #ddd;
  border-radius: 8px;
}

.info-box p {
  margin: 0.5rem 0;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid #ddd;
}

th, td {
  padding: 0.75rem;
  text-align: left;
}

th {
  background-color: #f4f4f4;
}

.footer {
  text-align: center;
  padding: 1rem;
  background-color: #f4f4f4;
  position: fixed;
  width: 100%;
  bottom: 0;
}

  </style>
</head>
<body>
<?php
     // session_start();
      $email= $_SESSION['email'];
      $result = userDisplay($email);

    ?>

  <main class="main-content">
    <section class="user-details">
      <h2>User Information</h2>
      <div class="info-box">
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Email:</strong> johndoe@example.com</p>
        <p><strong>Phone:</strong> +123-456-7890</p>
        <p><strong>Role:</strong> Patient</p>
      </div>
    </section>

    <section class="appointment-details">
      <h2>Appointments</h2>
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Doctor</th>
            <th>Message</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while($row= $result->fetch_assoc())
          {
            echo'
          <tr>
            <td>'.$row["appointment_date"].'</td>
            <td>'.$row["appointment_time"].'</td>
            <td>'.$row["username"].'</td>
            <td>'.$row["appointment_message"].'</td>
            <td>'.$row["appointment_status"].'</td>
          </tr> ';
          }
          ?>
          
        </tbody>
      </table>
    </section>
  </main>
<!--<tr>
            <td>2024-12-10</td>
            <td>Dr. Taylor</td>
            <td>Orthopedics</td>
            <td>Pending</td>
          </tr>
  <footer class="footer">
    <p>&copy; 2024 Hospital Management System. All rights reserved.</p>
  </footer>-->
</body>
</html>
