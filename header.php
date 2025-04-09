<?php
session_start();
ob_start();


//echo '<script>$_SESSION['email'];</script>';
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
    <!-- Header Area -->
<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
							<ul class="top-link">
								<li><a href="#">About</a></li>
								<li><a href="#">Doctors</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">FAQ</a></li>
							</ul>
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li><i class="fa fa-phone"></i>+880 1234 56789</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
							</ul>
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.html"><img src="img/logo.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="active"><a href="index.php">Home <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="index.php">Home Page 1</a></li>
												</ul>
											</li>
											<!-- Doctor -->
											 <?php
												
												if(isset($_SESSION['doc_email'])&& $_SESSION['type']=='doctor')
												{
											?>
														<li><a href="#">Doctos </a></li>
														<li><a href="../admin/doctorProfile.php">profile </a></li>
														<li><a href="appointmentsDisplay.php">appointment </a></li>
														<li><a href="logout.php">log out </a></li>
											<?php
												}
												else if(isset($_SESSION['email'])&& $_SESSION['type']=='user')
												{
											?>
														<!-- user -->
														<li><a href="userdisplay.php">booking </a></li>
														<li><a href="#">profile </a></li>
														<li><a href="appointment.php">appointment </a></li>
														<li><a href="#">search </a></li>
														<li><a href="logout.php">log out </a></li>
											<?php
												}
												else
												{
											?>

											
															<li><a href="#">Services </a></li>
															<!--<li><a href="#">Pages <i class="icofont-rounded-down"></i></a>
																<ul class="dropdown">
																	<li><a href="404.html">404 Error</a></li>
																</ul>
															</li>
															<li><a href="#">Blogs <i class="icofont-rounded-down"></i></a>
																<ul class="dropdown">
																	<li><a href="blog-single.html">Blog Details</a></li>
																</ul>
															</li>-->
															<li><a href="contact.html">Contact Us</a></li>
															<li><a href="../admin/login.php">doctor</a></li>
															<li><a href="login.php"> User</a></li>
											<?php
											}
											?>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		 <?php
			ob_end_flush();
		 ?>