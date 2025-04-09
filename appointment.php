<?php
//session_start();
    include('../admin/methods.php');
	include('header.php');
	if(!isset($_SESSION['email']))
        {
            header('location: login.php');
        }
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>Mediplus - Free Medical and Doctor Directory HTML Template.</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
		
    </head>
    <!-- Start Appointment -->
		<section class="appointment">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>We Are Always Ready to Help You. Book An Appointment</h2>
							<img src="img/section-img.png" alt="#">
							<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
						</div>
					</div>
				</div>
				<div class="row">
				<?php
					if (isset($_GET['doc_id'])) 
					{
						$doc_id = $_GET['doc_id'];
						$email = $_SESSION['email'];
						$res = getDoctorData($doc_id);
						$row = $res->fetch_assoc();
						
					}
    			?>
				<div class="col-lg-6 col-md-12 col-12">
						<form class="form" action="" method="post">
							<input name="doc_id" type="hidden" value="<?php echo htmlspecialchars($doc_id); ?>">
							<input name="email" type="hidden" value="<?php echo htmlspecialchars($email); ?>">
							
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
								<input name="name" type="text" placeholder="Name" 
								value="<?php echo htmlspecialchars($row['username'] ?? ''); ?>" required>

								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<input type="date" placeholder="Date" id="datepicker" name="appointment_date" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<input type="time" placeholder="time" id="datepicker" name="appointment_time" required>
								</div>
							</div>
							
							<div class="col-lg-12 col-md-12 col-12">
								<div class="form-group">
									<textarea name="appointment_message" placeholder="Write Your Message Here....." required></textarea>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-5 col-md-4 col-12">
									<div class="form-group">
										<div class="button">
											<button type="submit" class="btn" name="submit">Book An Appointment</button>
										</div>
									</div>
								</div>
								<div class="col-lg-7 col-md-8 col-12">
									<p>(We will confirm by a text message)</p>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-6 col-md-12 ">
						<div class="appointment-image">
							<img src="img/contact-img.png" alt="#">
						</div>
					</div>
					<?php
						if (isset($_POST['submit'])) {
							$response = appointment($_POST);

							if ($response == 1) {
								echo '<script>alert("Your appointment has been booked successfully.");</script>';
							} else {
								echo '<script>alert("Error: ' . $response . '");</script>';
							}
						}
					?>
				</div>
			</div>
		</section>
		<!-- End Appointment -->