<?php
include('../admin/methods.php');
include('../user/phpmailer/PHPMailerAutoload.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    $appointment_id= $_GET['appointment_id'];
    $result = confirmAppointment($appointment_id);
    if($result==1)
    {
        $appointmentDetails = getAppointmentDetails($appointment_id);
        if ($appointmentDetails && $appointmentDetails->num_rows > 0) 
        {
            $row = $appointmentDetails->fetch_assoc();
            $email = $row['email'];
            $res=sendEmail($email, $row);
        
            if($res == "1")
            {
                alert("you confirmed patient appointment and email sent!");
                //header('location:appointmentsDisplay.php');
            }
            else{
                return '<script>alert("you did not confirmed patient appointment");</script>';
            }

        
        }
    }
}

function sendEmail($email, $row)
{
    $mail = new PHPMailer() ;
    $mail->isSMTP();  //Only enable when use in local server 

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'bhagyasreesaha062@gmail.com';
    $mail->Password = 'jinmhaeqekvqqtxo';

    $mail->setFrom('bhagyasreesaha062@gmail.com', 'Email Verification');
    $mail->addAddress($email);
    $mail->addReplyTo('bhagyasreesaha062@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Appointment Confirmation';
    $mail->Body = "
                <h1>Appointment Confirmation</h1>
                <p>Dear " . htmlspecialchars($row['username']) . ",</p>
                <p>Your appointment has been confirmed!</p>
                <ul>
                    <li><strong>Date:</strong> " . htmlspecialchars($row['appointment_date']) . "</li>
                    <li><strong>Time:</strong> " . htmlspecialchars($row['appointment_time']) . "</li>
                </ul>
                <p>Thank you,<br>Clinic Team</p>
            ";
            $mail->AltBody = "Dear " . htmlspecialchars($row['username']) . ",\n\n" .
                            "Your appointment has been confirmed!\n\n" .
                             "Date: " . htmlspecialchars($row['appointment_date']) . "\n" .
                             "Time: " . htmlspecialchars($row['appointment_time']) . "\n\n" .
                             "Thank you,\nClinic Team";

    if($mail->send())
    {
        return "1";
    }
    else{
        return "0";
    }
}
?>