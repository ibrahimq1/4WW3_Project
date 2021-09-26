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
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<!-- Bootstrap Icon library -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

		<!-- Metadata -->
		<title>4WW3 Project - Part_1 - Home and Search</title>
		<meta charset="utf8"/>
		<meta name="author" content="Quazi Rafid Ibrahim, Frank Su" />
		<meta name="description" content="CS 4WW3 Project Part 1" />
		<meta name="keywords" content="web,programming,McMaster,4ww3 Project" />
		
		<!-- Tell search engines not to index this page -->
		<meta name="robots" content="noindex"/>
		
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
						<li><a href = "#"> Home </a></li>
						<li><a href = "#"> Search Courts </a></li>
						<li><a href = "#"> Results </a></li>
						<li><a href = "#"> Example Individual Object </a></li>
						<li><a href = "#"> Submit New Court </a></li>
						<div class="login-block">
						<li class="login-btn"><a href = "#"> Register </a></li>
						<li class="login-btn"><a href = "#"> Login </a></li>
						</div>
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
								<span title="Use current location" class="input-group-text"><i class="bi bi-geo-alt"></i></span>
								<input type="text" class="form-control" placeholder="Search by Location">
								<div class="input-group-append d-flex">
									<button class="input-group-text btn btn-primary" title="Search" id="pinkbg" type="submit"><i class="bi bi-search"></i></button>
								</div>
							</div>
							<div class="flex-row d-flex justify-content-center">
								<div class="input-field-rating">
									<div class="input-group-text">
										<select data-trigger="" name="any">
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
										<select data-trigger="" name="any">
											<option placeholder="" value="">Popularity</option>
											<option>Mostly Empty</option>
											<option>Popular</option>
											<option>Very Popular</option>
										</select>
									</div>
								</div>
								<div class="input-field-currently_playing">
									<div class="input-group-text">
										<select data-trigger="" name="any">
											<option placeholder="" value="">Currently Playing</option>
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
			<div class="container-fuild h-100" style="padding-bottom:80px;">
				<div class="row h-100">
					<div class="col-md-6 d-flex" style="border-right:2px #FF385C solid">
					<div class="row">
							<div class="card" style="width:33%; height:50%;">
								<img class="card-img-top" src="assets/img/ballcourt1.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Title</h5>
									<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<a href="#" class="btn btn-primary" id="pinkbg">Go somewhere</a>
								</div>
							</div>
							<div class="card" style="width:33%; height:50%;">
								<img class="card-img-top" src="assets/img/ballcourt1.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Title</h5>
									<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<a href="#" class="btn btn-primary" id="pinkbg">Go somewhere</a>
								</div>
							</div>
							<div class="card" style="width:33%; height:50%;">
								<img class="card-img-top" src="assets/img/ballcourt1.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Title</h5>
									<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<a href="#" class="btn btn-primary" id="pinkbg">Go somewhere</a>
								</div>
							</div>
							<div class="card" style="width:33%; height:50%;">
								<img class="card-img-top" src="assets/img/ballcourt1.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Title</h5>
									<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<a href="#" class="btn btn-primary" id="pinkbg">Go somewhere</a>
								</div>
							</div>
							<div class="card" style="width:33%; height:50%;">
								<img class="card-img-top" src="assets/img/ballcourt1.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Title</h5>
									<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<a href="#" class="btn btn-primary" id="pinkbg">Go somewhere</a>
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-6">
					<img src="assets/img/map-img.png">
					</div>
				</div>
			</div>
		</section>
			


		
		<main>
	
		

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