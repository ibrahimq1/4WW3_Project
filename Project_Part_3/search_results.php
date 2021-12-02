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

	<!-- AJAX script -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/handleCommentsAJAX.js"></script>
	<script src="./assets/js/mapthings.js"></script>

</head>


</head>

<body>
	<!-- header included from another file -->
	<?php include 'header.php'; ?>
	<?php include './scripts/search_results_script.php'; ?>

	<!-- Actual Body Content -->
	<section id="main">
		<?php
		if (isset($_SESSION["flash-error"])) {
			vprintf("<div class='alert alert-danger' style='text-align: center;'>%s</div>", $_SESSION["flash-error"]);
			unset($_SESSION["flash-error"]);
		}
		if (isset($_SESSION["flash-success"])) {
			vprintf("<div class='alert alert-success' style='text-align: center;'>%s</div>", $_SESSION["flash-success"]);
			unset($_SESSION["flash-success"]);
		} ?>
		<div class="container" style="padding-top:50px; padding-bottom:50px;">
			<!-- check to see if flash message is set, if so display it -->
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 align-self-center animate__animated animate__slideInDown">

					<form method="get" action="/Project_Part_3/scripts/retrieve_courts.php">
						<div class="input-group mb-3">
							<span title="Use current location" onclick="getLocation()" class="input-group-text mobview" id="userloc"><i class="bi bi-geo-alt"></i></span>
							<input type="text" class="form-control" id="searchString" name="location" placeholder="Search by latitude and longitude (i.e. -70.34,90.64)">
							<div class="input-group-append d-flex">
								<button class="input-group-text btn btn-primary" title="Search" id="pinkbg" type="submit"><i class="bi bi-search"></i></button>
							</div>
						</div>
						<div class="flex-row d-flex justify-content-center">
							<div class="input-field-rating">
								<div class="input-group-text">
									<select data-trigger="" name="rating">
										<option placeholder="" value="">Rating</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<div class="container-fuild h-100" style="height: 100vh !important; overflow: scroll; overflow-x:hidden;">
			<div class="row h-100 g-0">
				<div class="col-md-6 d-flex align-content-end animate__animated animate__slideInLeft">
					<div class="row g-0" style="width:100%;">

						<?php
						if (!empty($result) && $result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) { ?>


								<div class="card" id=<?php echo "card" . $row['id'] ?>>
									<!-- div class="card-header">Popular</div> !-->
									<img class="card-img-top" style="min-width:50%; min-height:50%; max-height:50%;" src=<?php echo "https://4ww3-media.s3.ca-central-1.amazonaws.com" . $row['audioRef'] ?> alt="Card image cap">
									<div class="card-body">
										<h5 class="card-title"><?php echo $row["name"] ?></h5>

										<!-- Dynamic Rating -->
										<?php
										if ($row['rating'] != NULL && $row['rating'] > 0) {

											$numstars;

											for ($i = 1; $i <= $row['rating']; $i++) {
												echo '<span class="bi bi-star-fill"></span>';
												$numstars = $i;
											}

											$unfilled = 5 - $numstars;

											for ($i = 0; $i < $unfilled; $i++) {
												echo '<span class="bi bi-star"></span>';
											}
										} else {
											echo '<span>No rating yet.</span>';
										}
										?>
										<p><?php echo "Currently Playing: " . $row['playerCount'] ?></p>
										<p class="card-text"> <?php echo $row['description'] ?> </p>
										<a href="/Project_Part_3/individual_court.php?court=<?php echo $row['id'] ?>" class="btn btn-primary" id="pinkbg">Let's go!</a>
									</div>
								</div>
								<!-- getting map marker data specific to search !-->
								<script>
									//data for map marker popup
									var contentString =
										'<div id="content">' +
										'<div id="siteNotice">' +
										"</div>" +
										'<img id="card" style="padding-bottom:10px; margin-left:0;" width="100%" height="auto" src=' + "<?php echo "https://4ww3-media.s3.ca-central-1.amazonaws.com" . $row['audioRef'] ?>" + ">" +
										'<h3 id="firstHeading" class="firstHeading"><a href=' + "/Project_Part_3/individual_court.php?court=" + <?php echo $row['id'] ?> + '>' + '<?php echo $row["name"] ?>' + '</b></a></h3>' +
										'<div id="bodyContent" style="padding-top:10px">' +
										'<p>' + '<?php echo $row['description'] ?>' +
										"</p>" +
										"</div>" +
										"</div>";
									//Title, Lat, Long, z-index, info
									locations.push(new Array('<?php echo $row['name']; ?>', parseFloat('<?php echo $row['latitude']; ?>'), parseFloat('<?php echo $row['longitude']; ?>'), parseInt('<?php echo 1 ?>'), contentString))
								</script>

						<?php }
						} else {
							echo "<td colspan='2'> No data available </td>";
						}
						?>

						<div aria-label="...">
							<ul class="pagination" style="float:right; padding:10px; margin-bottom:0;">
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
				<div class="col-md-6 animate__animated animate__slideInRight">
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbCe_n6mC5FSZWkVB-5AlK9W61Qi6s2gw&callback=initMap&libraries=&v=weekly" async></script>

	<!-- Map Ball Bounce Animation -->
	<script>
		// Map markers bounce on card image selection
		for (let i = 1; i <= locations.length; i++) {
			document.getElementById('card' + i).onmouseover = function(event) {
				mapmarkers[i - 1].setAnimation(google.maps.Animation.BOUNCE);
			}

			document.getElementById('card' + i).onmouseout = function(event) {
				mapmarkers[i - 1].setAnimation(null);
			}
		}
	</script>
	<!-- End Actual Body Content -->

	<!-- footer included from another file -->
	<?php include 'footer.php'; ?>

</body>

</html>



<!-- 
<div>Icons made by <a href="https://www.flaticon.com/authors/prettycons" title="prettycons">prettycons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
Video by Pavel Danilyuk from Pexels
-->