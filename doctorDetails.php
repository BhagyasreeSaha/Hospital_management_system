<?php
/*session_start();
ob_start(); // Start output buffering*/

include('../admin/methods.php');
include('header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management - Doctors</title>
</head>
<style>
    /* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

.header {
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

.header h1 {
    margin: 0;
    font-size: 2rem;
}

.search-bar {
    text-align: center;
    margin: 20px 0;
}

.search-bar input[type="text"] {
    width: 300px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}

.search-bar button {
    padding: 10px 15px;
    margin-left: 10px;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-bar button:hover {
    background-color: #0056b3;
}

.doctor-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

.doctor-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 250px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.doctor-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.doctor-img {
    width: 100%;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    height: 150px;
    object-fit: cover;
}

.doctor-name {
    margin: 10px 0 5px;
    font-size: 1.2rem;
    color: #007bff;
}

.doctor-specialization {
    font-weight: bold;
    color: #555;
}

.doctor-details {
    color: #666;
    margin: 5px 0;
}

.appointment-btn {
    display: inline-block;
    margin: 10px 0 20px;
    padding: 10px 15px;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.appointment-btn:hover {
    background-color: #218838;
}
</style>
<body onload="getAllDoctors()">
    <header class="header">
        <h1>Our Doctors</h1>
    </header>

    <div class="search-bar">
        <form method="GET">
            <input type="text" name="search" id="search" placeholder="Search by name or specialization" onkeyup="searchDoctor()">
            
        </form>
    </div>

    <main class="doctor-list" id="doctors">

    </main>

    <?php
        // $search = $_GET['search'] ?? '';
        // $result = displayDoctorData($search);
        // if ($result->num_rows > 0) {
        //     echo '<main class="doctor-list">';
        //     while ($row = $result->fetch_assoc()) {
        //         echo '
        //         <!-- Doctor Profile Card -->
        //         <div class="doctor-card">
        //             <img src="../admin/' . htmlspecialchars($row["doc_img"]) . '" alt="Doctor Image" class="doctor-img">
        //             <h2 class="doctor-name">' . htmlspecialchars($row["doc_username"]) . '</h2>
        //             <p class="doctor-specialization">' . htmlspecialchars($row["specialization"]) . '</p>
        //             <p class="doctor-details">Experience: ' . htmlspecialchars($row["experience"]) . '</p>
        //             <p class="doctor-details">Contact: ' . htmlspecialchars($row["doc_email"]) . '</p>
        //             <button class="appointment-btn" onclick="bookAppointment('. htmlspecialchars($row["doc_id"]) . ')">Book Appointment</button>
        //         </div>';
        //     }
        //     echo '</main>';
        // } else {
        //     echo '<p style="text-align: center;">No doctors found.</p>';
        // }
        ?>

    <script>
        function bookAppointment(doc_id) {
            fetch('check_session.php')
                .then(response => response.json())
                .then(data => {
                    if (data.is_logged_in) {
                        window.location.href = `appointment.php?doc_id=${doc_id}`;
                    } else {
                        alert('You must be logged in to book an appointment!');
                        window.location.href = 'login.php';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
        }

        async function searchDoctor()
        {
            var dname = document.getElementById('search').value;

            var response = await fetch(`GetDataByNameAPI.php?dname=${dname}`);
            var doctors = await response.json();

            console.log(doctors)

            var temp = "";

            for(i=0; i<doctors.length; i++)
            {
                temp += `<div class="doctor-card">`;
                    temp += `<img src="../admin/${doctors[i].doc_img}" alt="Doctor Image" class="doctor-img">`;
                    temp += `<h2 class="doctor-name">${doctors[i].doc_username}</h2>`;
                    temp += `<p class="doctor-specialization"></p>`;
                    temp += `<p class="doctor-details">Experience: </p>`;
                    temp += `<p class="doctor-details">Contact: </p>`;
                    temp += `<button class="appointment-btn" onclick="bookAppointment()">Book Appointment</button>`;
                temp += `</div>`;
            }
            document.getElementById('doctors').innerHTML = temp;
        }

        async function getAllDoctors()
        {
            var response = await fetch('GetAllDoctorsAPI.php');
            var doctors = await response.json();

            console.log(doctors)

            var temp = "";

            for(i=0; i<doctors.length; i++)
            {
                temp += `<div class="doctor-card">`;
                    temp += `<img src="../admin/${doctors[i].doc_img}" alt="Doctor Image" class="doctor-img">`;
                    temp += `<h2 class="doctor-name">${doctors[i].doc_username}</h2>`;
                    temp += `<p class="doctor-specialization"></p>`;
                    temp += `<p class="doctor-details">Experience: </p>`;
                    temp += `<p class="doctor-details">Contact: </p>`;
                    temp += `<button class="appointment-btn" onclick="bookAppointment()">Book Appointment</button>`;
                temp += `</div>`;
            }
            document.getElementById('doctors').innerHTML = temp;
        }
    </script>

    <?php
        include('footer.php');
    ?>
</body>
</html>
