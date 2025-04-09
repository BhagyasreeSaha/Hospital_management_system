<?php
session_start();

header('Content-Type: application/json');

// Check if email exists in the session
if (isset($_SESSION['email'])) {
    echo json_encode(['is_logged_in' => true]);
} else {
    echo json_encode(['is_logged_in' => false]);
}
exit();
?>
