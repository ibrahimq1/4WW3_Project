<!DOCTYPE html>
<!-- HTML5 Compliant -->
<html>

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<!-- external main CSS stylesheet -->
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="stylesheet" href="assets/css/individual_court.css">

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

	<!-- Open Graph Protocol Metadata (hardcoded for now, should be dynamically updated from db in future)-->
	<meta property="og:title" content="Baller's Paradise Court" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://moila.app/Project_Part_1/individual_court.php" />
	<meta property="og:image" content="assets/img/basketball-ball.png" />
	<meta property="og:description" content="Only for the best of the best." />
	<meta property="og:locale" content="en_US" />
	<meta property="og:site_name" content="Moila" />

	<!-- Twitter card tags (hardcoded for now, should be dynamically updated from db in future)-->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="Baller's Paradise Court" />
	<meta name="twitter:description" content="Only for the best of the best." />
	<meta name="twitter:site" content="@Moila" />
	<meta name="twitter:image" content="assets/img/basketball-ball.png" />

	<!-- Tell search engines not to index this page -->
	<meta name="robots" content="noindex" />

	<!-- favicon -->
	<link rel=icon typ="image/x-icon" href=favicon.ico>

	<!-- mobile home screen metadata -->
	<link rel="apple-touch-icon-precomposed" href="assets/img/basketball-ball.png" />
	<link rel="apple-touch-startup-image" href="assets/img/mobbg.png" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">

</head>


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
					<li><a href="/Project_Part_1/"> Search </a></li>
					<li><a href="/Project_Part_1/search_results.php"> Results </a></li>
					<li><a href="#"> Example Individual Object </a></li>
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

		<div class="container">
			<div class="row">

				<!-- first column contains google maps pic (just a png for now)-->
				<div class="col-md-3">
					<p class="lead" style="margin-top: 50px; font-size: 30px"><b>Location</b></p>
					<img src="assets/img/map-img.png" class="img-thumbnail">
					<div><a class="btn btn-xs btn-success" id="pinkbg" style="margin-bottom: 10px; margin-top: 10px">Update</a>
						<h4>Currently <strong>15</strong> people playing!</h4>
						<video controls style="width:100%; margin-top:30px;" poster="assets/img/mobbg.png">
							<source src="assets/img/ball.mp4" />
						</video>
					</div>

				</div>

				<!-- second column contains actual individual object (basketball court) with comments -->
				<!-- Schema.org place microdata -->
				<div itemscope itemtype="https://schema.org/Place" class="col-md-9">
					<div class="thumbnail">
						<picture>
							<source media="(min-width: 800px)" srcset="assets/img/ballcourt1.jpg, assets/img/ballcourt1-2x.jpg 2x">
							<source media="(min-width: 450px)" srcset="assets/img/ballcourt1-512.jpg, assets/img/ballcourt1-512-2x.jpg 2x">
							<img itemprop="photo" src="assets/img/ballcourt1.jpg" srcset="assets/img/ballcourt1-512.jpg" alt="cool basketball court">
						</picture>

						<div class="card" style="padding-left:10px">
							<h4 style="margin-top: 10px; color: #00BFFF"><a>Baller's Paradise Court</a></h4>

							<p itemprop="slogan"><strong>Only for the best of the best. </strong></p>
							<p>
								<em>Submitted By: Frank Su</em>
							</p>
							<!-- Schema.org Place lat/long geolocation microdata -->
							<div itemprop="geo" itemscope itemtype="https://schema.org/GeoCoordinates">
								<p>
									<em itemprop="address">Location: 123 Western Road, L8S3M1</em>
								<p>Latitude: <em itemprop="latitude">43.26501</em></p>
								<p>Longitude: <em itemprop="longitude">-79.93867</em></p>
								</p>
							</div>
						</div>
					</div>

					<!-- Comment section -->
					<div class="well">
						<form>
							<button class="btn btn-success" type="submit" id="pinkbg">Add New Comment</button>
							<div class="input-group mb-3" style="padding-top:20px;">
								<input type="text" class="form-control" name="comment" style="padding-bottom:100px" placeholder="Write your comment here">
							</div>
						</form>
						<hr>

						<!-- An individual comment has author name, comment, and date commented -->
						<div class="row" itemscope itemtype="https://schema.org/Review">
							<div class="col-md-12">
								<strong itemprop="author">Frank Su</strong>
								</br>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star"></span>
								<span class="bi bi-star"></span>
								<!-- microdata for review rating and body -->
								<meta itemprop="reviewRating" content="3">
								<span class="float-end" itemprop="datePublished">2021-04-03</span>
								<p itemprop="reviewBody">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia perspiciatis repellat odit ipsa pariatur quisquam a laboriosam culpa maxime? Itaque!</p>
							</div>
						</div>

						<!-- Another individual comment -->
						<div class="row" itemscope itemtype="https://schema.org/Review">
							<div class="col-md-12">
								<strong itemprop="author">Rafid Ibrahim</strong>
								</br>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star-fill"></span>
								<span class="bi bi-star-half"></span>
								<span class="bi bi-star"></span>
								<!-- microdata for review rating and body -->
								<meta itemprop="reviewRating" content="3.5">
								<span class="float-end" itemprop="datePublished">2021-09-01</span>
								<p itemprop="reviewBody">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia perspiciatis repellat odit ipsa pariatur quisquam a laboriosam culpa maxime? Itaque!</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>


		<section>



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