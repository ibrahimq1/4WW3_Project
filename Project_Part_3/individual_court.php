<!-- header included from another file -->
<?php include 'header.php'; ?>

<!DOCTYPE html>
<!-- HTML5 Compliant -->
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

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

	<!-- AJAX script -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/handleCommentsAJAX.js"></script>
	<script src="./assets/js/mapthings.js"></script>
</head>

<?php include './scripts/individual_court_script.php'; ?>

<body>

	<!-- Actual Body Content -->
	<?php
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) { ?>

			<section id="main">
				<!-- flash message is displayed using JQuery if errors occur from submitting comments through AJAX -->
				<div class='alert alert-danger' style='text-align: center; display: none; width: 100%' id='flash-error'></div>
				<div class='alert alert-success' style='text-align: center; display: none; width: 100%' id='flash-success'></div>
				<div class="container">
					<div class="row">

						<!-- first column contains google maps pic (just a png for now)-->
						<div class="col-md-3">
							<p class="lead" style="margin-top: 50px; font-size: 30px"><b>Location</b></p>
							<!-- <img src="assets/img/map-img.png" alt="google map" class="img-thumbnail"> -->
							<div id="map" style="height:300px"></div>
							<div><a class="btn btn-xs btn-success" id="pinkbg" style="margin-bottom: 10px; margin-top: 10px">Update</a>
								<h4>Currently <strong><?php echo  $row['playerCount'] ?> </strong> people playing!</h4>
								<video controls style="width:100%; margin-top:30px;" poster="assets/img/mobbg.png">
									<source src="assets/img/ball.mp4" />
								</video>
							</div>

						</div>

						<!-- second column contains actual individual object (basketball court) with comments -->
						<!-- Schema.org place microdata -->
						<div itemscope itemtype="https://schema.org/Place" class="col-md-9">
							<div class="">
								<picture>
									<img style="width:100%; padding-top:30px;" itemprop="photo" src="<?php echo "https://4ww3-media.s3.ca-central-1.amazonaws.com" . $row['audioRef'] ?> " alt="cool basketball court">
								</picture>

								<div class="well" style="padding-left:10px">
									<h4 style="margin-top: 10px; color: #00BFFF"><a><?php echo  $row['name'] ?> </a></h4>

									<p itemprop="slogan"><strong> <?php echo  $row['description'] ?> </strong></p>
									<p>
										<em>Submitted By: Frank Su</em>
									</p>
									<!-- Schema.org Place lat/long geolocation microdata -->
									<div itemprop="geo" itemscope itemtype="https://schema.org/GeoCoordinates">
										<p>
										<p>
										<h6> Location: </h6>
										</p>
										<p>Latitude: <em itemprop="latitude"> <?php echo  $row['latitude'] ?> </em></p>
										<p>Longitude: <em itemprop="longitude"><?php echo  $row['longitude'] ?> </em></p>
										</p>
									</div>
								</div>
							</div>
							<!-- getting map marker data specific to search !-->
							<script>
									//data for map marker popup
								var contentString =
								'<div id="content">' +
								'<div id="siteNotice">' +
								"</div>" +
								'<img id="card" style="padding-bottom:10px; margin-left:0;" width="100%" height="auto" src='+ "<?php echo "https://4ww3-media.s3.ca-central-1.amazonaws.com" . $row['audioRef'] ?>" + ">" +
								'<h3 id="firstHeading" class="firstHeading"><a href=' + "/Project_Part_3/individual_court.php?court=" + <?php echo $row['id']?> + '>' + '<?php echo $row["name"] ?>' + '</b></a></h3>' +
								'<div id="bodyContent" style="padding-top:10px">' +
								'<p>' + '<?php  echo $row['description'] ?>' +
								"</p>" +
								"</div>" +
								"</div>";
								//Title, Lat, Long, z-index, info
								locations.push(new Array('<?php echo $row['name'];?>', parseFloat('<?php echo $row['latitude'];?>'), parseFloat('<?php echo $row['longitude'];?>'), parseInt('<?php echo 1?>'), contentString))
							</script>
					<?php }
			} else {
				echo "<td colspan='2'> No data available </td>";
			}
					?>

					<!-- Comment section -->
					<div class="well">
						<div name="addComment">
							<!-- when button is clicked, call AJAX script to post data to server -->
							<button class="btn btn-success" type="submit" id="pinkbg" onclick="handleCommentSubmission(<?php echo $_GET['court']; ?>)">Add New Comment</button>
							<div class="input-field-rating">
								<div class="btn input-group-text">
									<select data-trigger="" name="courtRating" id="courtRating">
										<option placeholder="" value="">Rating</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
							</div>
							<div class="input-group mb-3" style="padding-top:20px;">
								<input type="text" class="form-control" name="comment" id="comment" style="padding-bottom:100px" placeholder="Write your comment here">
							</div>
						</div>
						<hr>
						<div id="commentContainer">

						</div>
					</div>
						</div>
					</div>
				</div>
			</section>

			<!-- End Actual Body Content -->
			<!-- JS GetuserLocation Map -->
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbCe_n6mC5FSZWkVB-5AlK9W61Qi6s2gw&callback=initMap&libraries=&v=weekly" async="false"></script>
			

			<script>
				$.ajax({
					url: "/Project_Part_3/scripts/retrieve_comments.php?courtId=" + <?php echo $_GET['court'] ?>,
					method: "GET",
					data: JSON.stringify({
						courtId: <?php echo $_GET['court'] ?>,
					}),
					datatype: "json",
					success: function(response) {
						let data = JSON.parse(response);

						// use JQuery to display error flash message on invidivudal_court.php
						if (data.response_status === "error") {
							let errorMessage1 = data.response_description;
							// case where error message wasn't already displayed
							if ($("#flash-error").css("display") == "none") {
								$("#flash-error").css("display", "block");
								$("#flash-error").html(errorMessage1);
							}
							// case where error message was already displayed, but with different error
							else if ($("#flash-error").text() !== errorMessage1) {
								$("#flash-error").html(errorMessage1);
							}
							return;
						}

						// otherwise use jquery to render comments
						else {
							let contentString;
							comments = data.data;

							for (let i = 0; i < comments.length; i++) {
								document.getElementById("commentContainer").innerHTML +=
									'<div id=' +
									comments[i].id +
									' class="row" itemscope itemtype="https://schema.org/Review">' +
									'<div class="col-md-12">' +
									'<strong itemprop="author">' +
									comments[i].username +
									"</strong>" +
									"</br>" +
									"<span> Rating: " +
									comments[i].rating +
									"</span>" +
									'<meta itemprop="reviewRating" content="3">' +
									'<span class="float-end" itemprop="datePublished">' +
									comments[i].date +
									"</span>" +
									'<p itemprop="reviewBody">' +
									comments[i].comment +
									"</p>" +
									"</div>" +
									"</div>";
							}

						}
					},
				});
			</script>

			<footer id="footer" class="fixed-bottom">
				<div class="container">
					<div class="copyright">
						&copy; Copyright <strong><span>Moila</span></strong>. All Rights Reserved - Designed by <a href="#">Quazi Rafid Ibrahim</a> & <a href="#">Frank Su</a>
					</div>
				</div>
			</footer>
</body>

</html>




<!-- 
<div>Icons made by <a href="https://www.flaticon.com/authors/prettycons" title="prettycons">prettycons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
Video by Pavel Danilyuk from Pexels
-->