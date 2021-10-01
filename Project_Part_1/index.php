<!DOCTYPE html>
<!-- HTML5 Compliant -->
<html>

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<!-- external main CSS stylesheet -->
	<link rel="stylesheet" href="assets/css/style.css" />

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
	<!-- Bootstrap Icon library -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

	<!-- Animate.css library !-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

	<!-- Metadata -->
	<title>4WW3 Project - Part_1 - Home and Search</title>
	<meta charset="utf8" />
	<meta name="author" content="Quazi Rafid Ibrahim, Frank Su" />
	<meta name="description" content="CS 4WW3 Project Part 1" />
	<meta name="keywords" content="web,programming,McMaster,4ww3 Project" />

	<!-- Tell search engines not to index this page -->
	<meta name="robots" content="noindex" />

</head>

<body>
	<!-- Navigation Bar [will seperate later] no js allowed, so didn't implement hamburger menu-->

	<header class="fixed-top d-flex align-items-center">
		<div class="container d-flex align-items-center justify-content-between">
			<div class="d-flex">
				<img class="logoimg" src="assets/img/basketball-ball.png"></img>
				<h1><a class="logotxt" href="#">Moila</a></h1>
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a href="#"> Home </a></li>
					<li><a href="/Project_Part_1/search_results.php"> Search Courts </a></li>
					<li><a href="/Project_Part_1/individual_court.php"> Example Individual Object </a></li>
					<li><a href="/Project_Part_1/court_submission.php"> Submit New Court </a></li>
					<li class="login-btn"><a href="/Project_Part_1/user_registration.php"> Register </a></li>
					<li class="login-btn"><a href="#"> Login </a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
		</div>
	</header>
	<!-- End Navigation Bar -->

	<!-- Actual Body Content -->

	<section id="main">

		<video autoplay muted loop id="mp4Video" class="overlay">
			<source src="assets/img/ball.mp4" type="video/mp4">
		</video>

		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 align-self-center">
					<div class="letsfindcourts">
						<h1 class="letsfindcourts-text">Let's find courts!</h1>
					</div>
					<form>
						<div class="input-group mb-3">
							<span title="Use current location" class="input-group-text" id="mobview"><i class="bi bi-geo-alt"></i></span>
							<input type="text" class="form-control" name="location" placeholder="Search by Location">
							<div class="input-group-append d-flex">
								<button class="input-group-text btn btn-primary" title="Search" id="pinkbg" type="submit"><i class="bi bi-search"></i></button>
							</div>
						</div>
						<div class="flex-row d-flex justify-content-center">
							<div class="input-field-rating">
								<div class="input-group-text">
									<select data-trigger="" name="rating">
										<option placeholder="" value="">Rating</option>
										<option>1+</option>
										<option>2+</option>
										<option>3+</option>
										<option>4+</option>
										<option>5</option>
									</select>
								</div>
							</div>
							<div class="input-field-popularity">
								<div class="input-group-text">
									<select data-trigger="" name="popularity">
										<option placeholder="" value="">Popularity</option>
										<option>Mostly_Empty</option>
										<option>Popular</option>
										<option>Very_Popular</option>
									</select>
								</div>
							</div>
							<div class="input-field-currently_playing">
								<div class="input-group-text">
									<select data-trigger="" name="currently_playing">
										<option placeholder="" value="">Currently_Playing</option>
										<option>0</option>
										<option>2+</option>
										<option>5+</option>
										<option>10+</option>
									</select>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</section>

	<!-- End Actual Body Content -->


	<!-- Footer [will sepearte later]-->
	<footer id="footer" class="fixed-bottom">
		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong><span>Moila</span></strong>. All Rights Reserved - Designed by <a href="#">Quazi Rafid Ibrahim</a> & <a href="#">Frank Su</a>
			</div>
		</div>
	</footer>
	<!-- End Footer -->

</body>

</html>



<!-- 
<div>Icons made by <a href="https://www.flaticon.com/authors/prettycons" title="prettycons">prettycons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
Video by Pavel Danilyuk from Pexels
-->