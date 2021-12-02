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

    // if user searched by location only
    else if (empty($rating) && !empty($location)) {

      // if location was not entered in correct format, redirect to homepage with error message
      if (!preg_match("/^(-?\d+(\.\d+)?),\s*(-?\d+(\.\d+)?)$/", $location)) {
        if (isset($_SESSION["flash-error"])) {
          unset($_SESSION["flash-error"]);
        }
        $_SESSION["flash-error"] = ["message" => "Please make sure location is in the format: longitude, latitude (seperate longitude and latitude with a comma)"];
        header("Location: /Project_Part_3/index.php");
        die();
      }

      // if location entered correctly, we query database for all courts within 50 km of starting location
      else {
        $locationNoWhitespace = str_replace(' ', '', $location);
        $startingLatitude = explode(",", $locationNoWhitespace)[0];
        $startingLongitude = explode(",", $locationNoWhitespace)[1];
        $retrieveCourtsSql = "SELECT id, SQRT(POW(69.1 * (latitude - " . $startingLatitude . "), 2) + POW(69.1 * (" . $startingLongitude . " - longitude) * COS(latitude / 57.3), 2)) AS distance FROM submitted_courts HAVING distance < 50 ORDER BY distance";
      }
    }

    // if user searched by location AND rating
    else if (!empty($rating) && !empty($location)) {
      // if location was not entered in correct format, redirect to homepage with error message
      if (!preg_match("/^(-?\d+(\.\d+)?),\s*(-?\d+(\.\d+)?)$/", $location)) {
        if (isset($_SESSION["flash-error"])) {
          unset($_SESSION["flash-error"]);
        }
        $_SESSION["flash-error"] = ["message" => "Please make sure location is in the format: longitude, latitude (seperate longitude and latitude with a comma)"];
        header("Location: /Project_Part_3/index.php");
        die();
      }

      // if location entered correctly, we query database for all courts within 50 km of starting location
      else {
        $locationNoWhitespace = str_replace(' ', '', $location);
        $startingLatitude = explode(",", $locationNoWhitespace)[0];
        $startingLongitude = explode(",", $locationNoWhitespace)[1];
        $retrieveCourtsSql = "SELECT id, SQRT(POW(69.1 * (latitude - " . $startingLatitude . "), 2) + POW(69.1 * (" . $startingLongitude . " - longitude) * COS(latitude / 57.3), 2)) AS distance FROM submitted_courts WHERE rating >= " . $rating . " HAVING distance < 50 ORDER BY distance";
      }
    }

    // get a list of courtIds that satisfy the search query
    if ($result = $conn->query($retrieveCourtsSql)) {

      $courtIdArray = array();
      $distanceArray = array();

      // loop through result object, populate array with rows
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $courtIdArray[] = $row['id'];
        if (isset($row['distance'])) {
          $distanceArray[] = $row['distance'];
        }
      }

      // set session variable with the array of courtIds
      if (isset($_SESSION["courtsToDisplay"])) {
        unset($_SESSION["courtsToDisplay"]);
      }
      if (isset($_SESSION["courtDistances"])) {
        unset($_SESSION["courtDistances"]);
      }

      // set success flash message if user was searching only by rating
      if (empty($location) && !empty($rating)) {
        if (empty($courtIdArray)) {
          if (isset($_SESSION["flash-error"])) {
            unset($_SESSION["flash-error"]);
          }
          $_SESSION["flash-error"] = ["message" => "There are no courts with rating greater than or equal to " . $rating];
        } else {
          if (isset($_SESSION["flash-success"])) {
            unset($_SESSION["flash-success"]);
          }
          $_SESSION["flash-success"] = ["message" => "Displaying all courts with rating greater than or equal to " . $rating];
        }
      }

      // set success flash message if user was seasrching only by location
      else if (empty($rating) && !empty($location)) {
        if (empty($courtIdArray)) {
          if (isset($_SESSION["flash-error"])) {
            unset($_SESSION["flash-error"]);
          }
          $_SESSION["flash-error"] = ["message" => "There are no courts less than 50km away from latitude:  " . $startingLatitude . " and longitude: " . $startingLongitude];
        } else {
          if (isset($_SESSION["flash-success"])) {
            unset($_SESSION["flash-success"]);
          }
          $_SESSION["flash-success"] = ["message" => "Displaying all courts less than 50km away from latitude:  " . $startingLatitude . " and longitude: " . $startingLongitude];
        }
      }

      // set success flash message if user was searching by both location and rating
      else if (!empty($rating) && !empty($location)) {
        if (empty($courtIdArray)) {
          if (isset($_SESSION["flash-error"])) {
            unset($_SESSION["flash-error"]);
          }
          $_SESSION["flash-error"] = ["message" => "There are no courts less than 50km away from latitude:  " . $startingLatitude . " and longitude: " . $startingLongitude . " and with rating greater than or equal to " . $rating];
        } else {
          if (isset($_SESSION["flash-success"])) {
            unset($_SESSION["flash-success"]);
          }
          $_SESSION["flash-success"] = ["message" => "Displaying all courts less than 50km away from latitude:  " . $startingLatitude . " and longitude: " . $startingLongitude . " and with rating greater than or equal to " . $rating];
        }
      }

      $_SESSION['courtDistances'] = $distanceArray;
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
