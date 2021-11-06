<!DOCTYPE html>
<!-- HTML5 Compliant -->
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

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
	<title>Moila</title>
	<meta charset="utf8" />
	<meta name="author" content="Quazi Rafid Ibrahim, Frank Su" />
	<meta name="description" content="CS 4WW3 Project Part 1" />
	<meta name="keywords" content="web,programming,McMaster,4ww3 Project" />

	<!-- Tell search engines not to index this page -->
	<meta name="robots" content="noindex" />

	<!-- favicon -->
	<link rel=icon typ="image/x-icon" href=favicon.ico>

</head>


</head>

<body>
	<!-- Navigation Bar [will seperate later] no js allowed, so didn't implement hamburger menu-->

	<header class="fixed-top d-flex align-items-center">
		<div class="container d-flex align-items-center justify-content-between">
			<div class="d-flex">
				<picture>
					<source media="(min-width: 800px)" srcset="assets/img/basketball-ball.png, assets/img/basketball-ball-2x.png">
					<source media="(min-width: 450px)" srcset="assets/img/basketball-ball-256.png, assets/img/basketball-ball-256-2x.png">
					<img class="logoimg" width="100%" height="100%" src="assets/img/basketball-ball.png" srcset="assets/img/basketball-ball-256.png" alt="moila basketball logo image">
				</picture>
				<h1><a class="logotxt" href="#">Moila</a></h1>
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a href="/Project_Part_2/"> Search </a></li>
					<li><a href="/Project_Part_2/search_results.php"> Results </a></li>
					<li><a href="/Project_Part_2/individual_court.php"> Example Individual Object </a></li>
					<li><a href="/Project_Part_2/court_submission.php"> Submit New Court </a></li>
					<li class="login-btn"><a href="/Project_Part_2/user_registration.php"> Register </a></li>
					<li class="login-btn"><a href="#"> Login </a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
		</div>


	</header>
	<!-- End Navigation Bar -->

	<!-- Actual Body Content -->

	<section id="main">
		<div class="container" style="padding-top:50px; padding-bottom:50px;">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 align-self-center">

					<form>
						<div class="input-group mb-3">
							<span title="Use current location" onclick="getLocation()" class="input-group-text mobview" id="userloc"><i class="bi bi-geo-alt"></i></span>
							<input type="text" class="form-control" id="searchString" name="location" placeholder="Search by Location">
							<div class="input-group-append d-flex">
								<button class="input-group-text btn btn-primary" title="Search" id="pinkbg" type="submit"><i class="bi bi-search"></i></button>
							</div>
						</div>
						<div class="flex-row d-flex justify-content-center">
							<div class="input-field-rating">
								<div class="input-group-text">
									<select data-trigger="" name="Rating">
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
									<select data-trigger="" name="Popularity">
										<option placeholder="" value="">Popularity</option>
										<option>Mostly_Empty</option>
										<option>Popular</option>
										<option>Very_Popular</option>
									</select>
								</div>
							</div>
							<div class="input-field-currently_playing">
								<div class="input-group-text">
									<select data-trigger="" name="Currently_Playing">
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
		<div class="container-fuild h-100">
			<div class="row h-100 g-0">
				<div class="col-md-6 d-flex align-content-end">
					<div class="row g-0">
						<div class="card" id="card0">
							<div class="card-header">Popular</div>
							<img class="card-img-top" width="100%" height="100%" src="assets/img/ballcourt1.jpg" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Title</h5>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star-half"></span>
								<span class="bi bi-star"></span>
								<p>Currently Playing: 5+</p>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								<a href="/Project_Part_2/individual_court.php" class="btn btn-primary" id="pinkbg">Let's go!</a>
							</div>
						</div>
						<div class="card" id="card1">
							<img class="card-img-top" width="100%" height="100%" src="assets/img/ballcourt1.jpg" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Title</h5>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<p>Currently Playing: 0</p>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								<a href="/Project_Part_2/individual_court.php" class="btn btn-primary" id="pinkbg">Let's go!</a>
							</div>
						</div>
						<div class="card" id="card2">
							<img class="card-img-top" width="100%" height="100%" src="assets/img/ballcourt1.jpg" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Title</h5>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<p>Currently Playing: 0</p>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								<a href="/Project_Part_2/individual_court.php" class="btn btn-primary" id="pinkbg">Let's go!</a>
							</div>
						</div>
						<div class="card" id="card3">
							<img class="card-img-top" width="100%" height="100%" src="assets/img/ballcourt1.jpg" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Title</h5>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<p>Currently Playing: 0</p>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								<a href="/Project_Part_2/individual_court.php" class="btn btn-primary" id="pinkbg">Let's go!</a>
							</div>
						</div>
						<div class="card" id="card4">
							<img class="card-img-top" width="100%" height="100%" src="assets/img/ballcourt1.jpg" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Title</h5>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<p>Currently Playing: 0</p>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								<a href="/Project_Part_2/individual_court.php" class="btn btn-primary" id="pinkbg">Let's go!</a>
							</div>
						</div>
						<div aria-label="...">
						<ul class="pagination" style="float:right; padding:10px; margin-bottom:0;" >
							<li class="page-item">
							<span class="page-link">Previous</span>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
							<a class="page-link" href="#">Next</a>
							</li>
						</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="h-100">  
						<!-- <img width="100%" height="100%" alt="google map" src="assets/img/map-img.png"> -->
						<div id="map"></div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- Scripts -->

	<!-- Map Api -->
	<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbCe_n6mC5FSZWkVB-5AlK9W61Qi6s2gw&callback=initMap&libraries=&v=weekly"
      async
    ></script>
	<script src="./assets/js/mapthings.js"></script>

	

	<!-- End Actual Body Content -->


	<!-- Footer [will sepearte later]-->
	<footer id="footer" class="">
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