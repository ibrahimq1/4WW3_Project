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
    }

    // make a connection to database
    // create DB connection using secrets in .env file
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
      $_SESSION["flash-error"] = ["message" => "Error connecting to database!"];
      header("Location: /Project_Part_3/index.php");
      die();
    }

    // if user searched by rating only, 
    if (empty($location) && !empty($rating)) {
      $retrieveCourtsSql = "SELECT id FROM submitted_courts WHERE rating>=" . $rating;
    }

    // get a list of courtIds that satisfy the search query
    if ($result = $conn->query($retrieveCourtsSql)) {

      // set success flash message if user was searching only by rating
      if (empty($location) && !empty($rating)) {
        if (isset($_SESSION["flash-success"])) {
          unset($_SESSION["flash-success"]);
        }
        $_SESSION["flash-success"] = ["message" => "Displaying all courts with rating greater than or equal to " . $rating];
      }

      $courtIdArray = array();

      // loop through result object, populate array with rows
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $courtIdArray[] = $row['id'];
      }

      // set session variable with the array of courtIds
      if (isset($_SESSION["courtsToDisplay"])) {
        unset($_SESSION["courtsToDisplay"]);
      }
      $_SESSION['courtsToDisplay'] = $courtIdArray;

      header("Location: /Project_Part_3/search_results.php");
      die();
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
