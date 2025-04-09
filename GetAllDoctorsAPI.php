<?php
    include('../admin/methods.php');

    $res = displayDoctorData();

    // Check if there is data in the result
    if ($res->num_rows > 0) {
        // Fetch all rows as an associative array
        $data = [];
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }

        // Output the data in JSON format
        echo json_encode($data);
    } else {
        // If no data is found, return an empty JSON array
        echo json_encode([]);
    }
?>