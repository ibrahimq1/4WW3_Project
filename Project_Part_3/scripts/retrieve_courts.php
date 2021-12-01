<?php
//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

session_start();
// check request method
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // if both location and rating are not passed in form, return error essage in flash message
  if (isset($_GET['location']) && isset($_GET['rating'])) {
    $location = $_GET['location'];
    $rating = $_GET['rating'];

    // if both rating and location were not set, return with error mesage
    if (empty($location) && empty($rating)) {
      if (isset($_SESSION["flash-error"])) {
        unset($_SESSION["flash-error"]);
      }
      $_SESSION["flash-error"] = ["message" => "Please enter either a rating or latitude/longitude to search by!"];
      header("Location: /Project_Part_3/index.php");
      die();
    } else if (empty($location) && !empty($rating)) {
    }
  }
} else {
  if (isset($_SESSION["flash-error"])) {
    unset($_SESSION["flash-error"]);
  }
  $_SESSION["flash-error"] = ["message" => "Invalid request method! Please try again..."];
  header("Location: /Project_Part_3/index.php");
  die();
}
