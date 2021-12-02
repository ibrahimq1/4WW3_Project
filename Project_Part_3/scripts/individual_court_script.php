<?php

include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

if (isset($_GET['court'])) {

	// DB connect to store
	$databasename = getenv('DB_NAME');
	$dbhost = getenv('DB_HOST');
	$dbuser = getenv('DB_USER');
	$dbpassword = getenv('DB_PASSWORD');
	$conn = new mysqli($dbhost, $dbuser, $dbpassword, $databasename);

	// error connecting to database
	if ($conn->connect_error) {
		if (isset($_SESSION["flash-error"])) {
			unset($_SESSION["flash-error"]);
		}
		$_SESSION["flash-error"] = ["message" => "There was an error connecting to the database... please try again!"];
		header("Location: /Project_Part_3/court_submission.php");
		die();
	}

	$courtID = $_GET['court'];

	if (empty($courtID)) {
		echo "<p> Court not found </p>";
		exit();
	} else {
		$sql = "SELECT * FROM submitted_courts WHERE id=$courtID";
		$result = $conn->query($sql);
	}

	//uncomment to see data
	// echo "<pre>";
	// print_r($result->fetch_assoc());
}
// example Project_Part_3/individual_court.php?court=8

?>