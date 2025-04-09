<?php
    function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hospital";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    function registerDoctor($data)
    {
        $target_dir = "doctors/";
        $target_file = $target_dir . basename($_FILES["doc_img"]["name"]);

        $username=$_POST['doc_username'];
        $doc_email=$_POST['doc_email'];
        $contact=$_POST['contact'];
        $password=$_POST['password'];
        $experience= $_POST['experience'];
        $specialization= $_POST['specialization'];
        $conn = connect();

        if (move_uploaded_file($_FILES["doc_img"]["tmp_name"], $target_file))
        {
            $sql = "INSERT INTO doctors (doc_username, doc_email, contact, password,specialization,experience,doc_img)
            VALUES ('$username', '$doc_email', '$contact', '$password','$specialization','$experience','$target_file')";

            if ($conn->query($sql) === TRUE)
            {
                return 1;
            } 
            else    
            {
                return 0;
            }
        }
        else {
            return 2;
        }
        
        $conn->close();
    
    }

    function loginDoctor($data)
    {
        $doc_email = $data['doc_email'];
        $password = $data['password'];
        $conn = connect();
        $sql = "SELECT * FROM doctors where doc_email = '$doc_email' AND password = '$password'";
        $result = $conn->query($sql);
        return $result;
    }


    function displayDoctorData()
    {
        $conn = connect();
        $sql = "SELECT * FROM doctors";
        $result = $conn->query($sql);
        return $result;
    }

    function getDoctorDataByName($dname)
    {
        $s = "%".$dname."%";
        $conn = connect();
        $sql = "SELECT * FROM doctors where doc_username like '$s'";
        $result = $conn->query($sql);
        return $result;
    }

    function getDoctorData($doc_id)
    {
        $conn = connect();
        $sql = "SELECT * FROM doctors where doc_id = '$doc_id'";
        $result = $conn->query($sql);
        return $result;
    }

    function appointment($data)
    {
        // Sanitize input data
        $appointment_date = $data['appointment_date'];
        $appointment_time = $data['appointment_time'];
        $appointment_message = $data['appointment_message'];
        $doc_id = $data['doc_id'];
        $email = $data['email'];

        $conn = connect(); // Ensure this function returns a valid DB connection.

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO appointment (doc_id, email, appointment_date, appointment_time, appointment_message) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            return "Error in statement preparation: " . $conn->error;
        }

        $stmt->bind_param("sssss", $doc_id, $email, $appointment_date, $appointment_time, $appointment_message);

        if ($stmt->execute()) {
            return 1; // Success
        } else {
            return "Error: " . $stmt->error;
        }
    }

    function displayAppointment() 
    {
        
        $conn = connect(); 
        $doc_id = $_SESSION['doc_id'];
        $sql = "SELECT u.username, appointment.appointment_id, appointment.appointment_date,
        appointment.appointment_time, appointment.appointment_message, appointment.appointment_status
        FROM appointment 
        JOIN user u ON appointment.email = u.email 
        WHERE appointment.doc_id = '$doc_id'";
        $result = $conn->query($sql);
    
    
        return $result;
        
    }

    function confirmAppointment($appointment_id)
    {
        $conn = connect(); 
        $sql = "UPDATE appointment SET appointment_status='confirmed' WHERE appointment_id='$appointment_id'";
        $result = $conn->query($sql);
        return $result;

    }

    function cancelAppointment($appointment_id)
    {
        $conn = connect(); 
        $sql = $sql = "UPDATE appointment SET appointment_status='cancelled' WHERE appointment_id='$appointment_id'";
        $result = $conn->query($sql);
        return $result;

    }
    
    function getAppointmentDetails($appointment_id)
    {
        $conn = connect();
        $sql = "SELECT u.username, u.email, appointment.appointment_id, appointment.appointment_date,
        appointment.appointment_time, appointment.appointment_message, appointment.appointment_status 
        FROM appointment 
        JOIN user u ON appointment.email = u.email
        WHERE appointment.appointment_id = '$appointment_id'";
        $result = $conn->query($sql);
        return $result;
    }
    //$sql = "SELECT * FROM appointment WHERE appointment_id = '$appointment_id'"; d.specialization,

    function userDisplay($email)
    {
        $conn = connect();
        $sql = "SELECT d.username, appointment.appointment_id, appointment.appointment_date,
        appointment.appointment_time, appointment.appointment_message, appointment.appointment_status 
        FROM appointment 
        JOIN doctors d ON appointment.doc_id = d.doc_id
        WHERE appointment.email = '$email'";
        $result = $conn->query($sql);
        return $result;
    }
    function labTestinsert($data)
    {
        $test_name = $data['test_name'];
        $price = $data['price'];
        $description = $data['description'];
        
        $conn = connect();
        $sql = "INSERT INTO labtest (name, price, description) 
        VALUES('$test_name', '$price', '$description')";
        if($conn->query($sql) === TRUE)
        {
            return 1;
        }
        else {
            return 0;
        }
        $conn->close();

    }  
    
    function displayLabTest()
    {
        $conn = connect();
        $sql = "SELECT * FROM labtest";
        $result = $conn->query($sql);

        return $result;
    }
?>