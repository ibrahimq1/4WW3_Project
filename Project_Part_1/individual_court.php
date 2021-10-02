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
	<title>4WW3 Project - Part_1 - Home and Search</title>
	<meta charset="utf8" />
	<meta name="author" content="Quazi Rafid Ibrahim, Frank Su" />
	<meta name="description" content="CS 4WW3 Project Part 1" />
	<meta name="keywords" content="web,programming,McMaster,4ww3 Project" />

	<!-- Tell search engines not to index this page -->
	<meta name="robots" content="noindex" />

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
					<li><a href="/Project_Part_1/"> Home </a></li>
					<li><a href="/Project_Part_1/search_results.php"> Search Courts </a></li>
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
					</div>
				</div>

				<!-- second column contains actual individual object (basketball court) with comments -->
				<div class="col-md-9">
					<div class="thumbnail">
						<img src="assets/img/ballcourt1.jpg">
						<div class="card" style="padding-left:10px">
							<h4 style="margin-top: 10px; color: #00BFFF"><a>Baller's Paradise Court</a></h4>

							<p><strong>Only for the best of the best. </strong></p>
							<p>
								<em>Submitted By: Frank Su</em>
							</p>
							<p>
								<em>Location: 123 Western Road</em>
							</p>
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
						<div class="row">
							<div class="col-md-12">
								<strong>Frank Su</strong>
								<span class="float-end">3 days ago</span>
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia perspiciatis repellat odit ipsa pariatur quisquam a laboriosam culpa maxime? Itaque!</p>
							</div>
						</div>

						<!-- Another individual comment -->
						<div class="row">
							<div class="col-md-12">
								<strong>Rafid Ibrahim</strong>
								<span class="float-end">14 days ago</span>
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia perspiciatis repellat odit ipsa pariatur quisquam a laboriosam culpa maxime? Itaque!</p>
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