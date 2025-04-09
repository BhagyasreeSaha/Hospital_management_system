<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Doctor's Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
        }

        .profile-header .details {
            flex: 1;
        }

        .profile-header .details h1 {
            font-size: 2rem;
            color: #333;
            display: flex;
            align-items: center;
        }

        .profile-header .details h1 i {
            margin-left: 10px;
            color: #00796b;
            cursor: pointer;
        }

        .profile-header .details p {
            font-size: 1.1rem;
            color: #666;
            display: flex;
            align-items: center;
        }

        .profile-header .details p i {
            margin-left: 10px;
            color: #00796b;
            cursor: pointer;
        }

        .profile-content {
            margin-top: 20px;
        }

        .profile-content section {
            margin-bottom: 20px;
        }

        .profile-content h2 {
            font-size: 1.5rem;
            color: #555;
            margin-bottom: 10px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .profile-content h2 i {
            margin-left: 10px;
            color: #00796b;
            cursor: pointer;
        }

        .specialties {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .specialty {
            background: #e0f7fa;
            padding: 10px 15px;
            border-radius: 4px;
            color: #00796b;
            font-size: 0.9rem;
            position: relative;
        }

        .specialty i {
            position: absolute;
            top: 5px;
            right: 5px;
            color: #00796b;
            cursor: pointer;
        }

        .contact-info {
            list-style: none;
        }

        .contact-info li {
            margin-bottom: 10px;
            font-size: 1rem;
            display: flex;
            align-items: center;
        }

        .contact-info li i {
            margin-left: 10px;
            color: #00796b;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <img src="doctor.jpg" alt="Doctor's Photo">
            <div class="details">
                <h1>Dr. John Doe <i class="fa fa-edit" title="Edit"></i></h1>
                <p>MD, Cardiology Specialist <i class="fa fa-edit" title="Edit"></i></p>
                <p>10+ years of experience in heart and vascular care <i class="fa fa-edit" title="Edit"></i></p>
            </div>
        </div>

        <div class="profile-content">
            <section>
                <h2>Biography <i class="fa fa-edit" title="Edit"></i></h2>
                <p>Dr. John Doe is a highly skilled cardiologist with over a decade of experience in diagnosing and treating complex cardiovascular diseases. He is committed to providing personalized care and utilizing the latest advancements in medical technology. <i class="fa fa-edit" title="Edit"></i></p>
            </section>

            <section>
                <h2>Specialties <i class="fa fa-edit" title="Edit"></i></h2>
                <div class="specialties">
                    <div class="specialty">Cardiology <i class="fa fa-edit" title="Edit"></i></div>
                    <div class="specialty">Heart Failure Management <i class="fa fa-edit" title="Edit"></i></div>
                    <div class="specialty">Interventional Cardiology <i class="fa fa-edit" title="Edit"></i></div>
                    <div class="specialty">Preventive Cardiology <i class="fa fa-edit" title="Edit"></i></div>
                </div>
            </section>

            <section>
                <h2>Contact Information <i class="fa fa-edit" title="Edit"></i></h2>
                <ul class="contact-info">
                    <li><i class="fa fa-envelope"></i> Email: johndoe@hospital.com <i class="fa fa-edit" title="Edit"></i></li>
                    <li><i class="fa fa-phone"></i> Phone: (123) 456-7890 <i class="fa fa-edit" title="Edit"></i></li>
                    <li><i class="fa fa-map-marker"></i> Address: 123 Heartbeat Lane, Wellness City <i class="fa fa-edit" title="Edit"></i></li>
                </ul>
            </section>
        </div>
    </div>
</body>
</html>
