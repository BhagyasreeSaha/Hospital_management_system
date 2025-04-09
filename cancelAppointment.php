<?php
include('../admin/methods.php');
$appointment_id= $_GET['appointment_id'];
$result = cancelAppointment($appointment_id);
if($result==1)
{
    echo '<script>alert("you cancelled patient appointment");</script>';
    header('location:appointmentsDisplay.php');
}
else{

    echo '<script>alert("there is some problem");</script>';
}
?>