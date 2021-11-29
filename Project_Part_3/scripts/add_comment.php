<?php
//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

session_start();
// check request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // first check if user is logged in
  if (isset($_SESSION['userLoggedIn'])) {
    if (isset($_POST["rating"]) && isset($_POST["comment"])) {
      $username = $_SESSION['username'];
      $rating = $_POST["rating"];
      $comment = $_POST["comment"];

      // if either rating or comment is empty, redirect back with error message
      if (empty($comment)) {
        if (isset($_SESSION["flash-error"])) {
          unset($_SESSION["flash-error"]);
        }
        $_SESSION["flash-error"] = ["message" => "You cannot submit an empty comment!"];
        header("Location: /Project_Part_3/individual_court.php");
        die();
      }
      if (empty($rating)) {
        if (isset($_SESSION["flash-error"])) {
          unset($_SESSION["flash-error"]);
        }
        $_SESSION["flash-error"] = ["message" => "Please add a rating to your comment!"];
        header("Location: /Project_Part_3/individual_court.php");
        die();
      }

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
        $_SESSION["flash-error"] = ["message" => "There was an error connecting to the database... please try again!"];
        header("Location: /Project_Part_3/individual_court.php");
        die();
      }

      // successfull database connection
      else {
        $addCommentSql = "INSERT INTO `comments` (`comment`, `rating`, `username`) VALUES ('$comment', '$rating', '$username')";

        // if successfully added to database, store success flash message in session and redirect back to sign up
        if ($conn->query($addCommentSql) === TRUE) {
          // store a flash message as session variable
          if (isset($_SESSION["flash-success"])) {
            unset($_SESSION["flash-success"]);
          }
          $_SESSION["flash-success"] = ["message" => "Successfully added a comment!"];
          header("Location: /Project_Part_3/individual_court.php");
          die();
        }
        // else, store error flash message in session and redirect back to sign up
        else {
          // store a flash message as session variable
          if (isset($_SESSION["flash-error"])) {
            unset($_SESSION["flash-error"]);
          }
          $_SESSION["flash-error"] = ["message" => "There was an error saving the added comment to the database... please try again!"];
          header("Location: /Project_Part_3/individual_court.php");
          die();
        }
      }
    }
  }
  // cannot add review if user is not logged in
  else {
    if (isset($_SESSION["flash-error"])) {
      unset($_SESSION["flash-error"]);
    }
    $_SESSION["flash-error"] = ["message" => "You must be logged in to add a review!"];
    header("Location: /Project_Part_3/individual_court.php");
    die();
  }
}
// invalid request, redirect back to individual court
else {
  if (isset($_SESSION["flash-error"])) {
    unset($_SESSION["flash-error"]);
  }
  $_SESSION["flash-error"] = ["message" => "Invalid request method! Please try again..."];
  header("Location: /Project_Part_3/individual_court.php");
  die();
}
