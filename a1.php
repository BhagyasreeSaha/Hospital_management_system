<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        .appointment-container {
            width: 50%;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        select, input[type="date"], textarea, button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
        }

        .doctor-image {
            margin-top: 20px;
        }

        .doctor-image img {
            width: 100px;
            height: auto;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="appointment-container">
        <h2>We Are Always Ready To Help You.<br>Book An Appointment</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit praesent aliquot pretium.</p>
        <form>
            <select name="department" required>
                <option value="">Department</option>
                <option value="cardiology">Cardiology</option>
                <option value="neurology">Neurology</option>
            </select>
            <select name="doctor" required>
                <option value="">Doctor</option>
                <option value="dr_smith">Dr. Smith</option>
                <option value="dr_jane">Dr. Jane</option>
            </select>
            <input type="date" required>
            <textarea name="message" rows="4" placeholder="Write Your Message Here..." required></textarea>
            <button type="submit">Book Appointment</button>
        </form>
        <div class="doctor-image">
            <img src="doctor1.jpg" alt="Doctor 1">
            <img src="doctor2.jpg" alt="Doctor 2">
        </div>
    </div>
</body>
</html>
