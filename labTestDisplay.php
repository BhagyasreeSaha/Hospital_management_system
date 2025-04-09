<?php
include('header.php');
include('../admin/methods.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Test Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
/* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    color: #333;
}



/* Lab Test Section */
.lab-tests {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
}

.test-card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 250px;
    margin: 10px;
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease;
}

.test-card:hover {
    transform: scale(1.05);
}

.test-card h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
}

.price {
    font-size: 1.5em;
    color: #007BFF;
    margin-bottom: 10px;
}

.description {
    font-size: 1em;
    color: #555;
    margin-bottom: 15px;
}

.btn {
    background-color: #007BFF;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 1.1em;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

/* Appointment Section */
.appointment {
    background-color: #fff;
    padding: 20px;
    margin: 20px auto;
    width: 80%;
    max-width: 600px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.appointment h2 {
    text-align: center;
    margin-bottom: 20px;
}

.appointment form {
    display: flex;
    flex-direction: column;
}

.appointment label {
    margin-bottom: 5px;
    font-weight: bold;
}

.appointment input,
.appointment select {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

.appointment button {
    background-color: #007BFF;
    color: white;
    padding: 10px;
    border-radius: 5px;
    font-size: 1.1em;
    cursor: pointer;
    transition: background-color 0.3s;
}

.appointment button:hover {
    background-color: #0056b3;
}

/*footer {
    background-color: #007BFF;
    text-align: center;
    padding: 15px;
    color: white;
    position: fixed;
    width: 100%;
    bottom: 0;
}*/

/* Modal Styles */
.modal-content {
    padding: 20px;
    border-radius: 10px;
}

.modal-body {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Adds spacing between elements */
}

.modal-body label {
    font-weight: bold;
}

.modal-body input,
.modal-body select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
    width: 100%; /* Ensures inputs take full width of modal */
}

.modal-body button {
    align-self: center; /* Centers the button */
    padding: 10px 20px;
    font-size: 1.1em;
    border-radius: 5px;
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.modal-body button:hover {
    background-color: #0056b3;
}
.btn-close {
    display: inline-block; /* Ensure it is not hidden */
}


    </style>
</head>
<body>

    <main>
        
            <?php
                $result = displayLabTest();
                echo '<section class="lab-tests">';
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc()){
                        echo'
                        <div class="test-card">
                        <h2>'.htmlspecialchars($row['name']).'</h2>
                        <p class="price">'.htmlspecialchars($row['price']).'</p>
                        <p class="description">'.htmlspecialchars($row['description']).'</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Book Appointment</button>

                        </div>';
                    }
                }
                else{
                    echo '<p>no lab Test found</p>';
                }
            ?>
        </section>
        </main>
        <form action="" method="POST">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Book an Appointment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <section id="appointment" class="appointment">
            <?php
            $result = displayLabTest();
            $row = $result->fetch_assoc();
            ?>
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" required>

                <button type="submit" class="btn">Submit</button>
        </section>
        </div>
        </div>
    </div>
  </div>
</div>
</form>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
