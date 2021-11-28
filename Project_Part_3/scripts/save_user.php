<?php

// server side validation function
function validateForm($username, $password, $email, $country, $gender)
{
  // first validate that all fields are not empty
  if (empty($username) || empty($password) || empty($email) || empty($country) || empty($gender)) {
    return false;
  }
  // for username, it shouldnt have any whitespace
  if (preg_match('/\s/', $username)) {
    return false;
  }
  // passwords must be min 6 chars, with at least 1 capital letter and 1 digit
  if (strlen($password) < 6 || !preg_match('/[A-Z]/', $password) || !preg_match('~[0-9]+~', $password)) {
    return false;
  }
  // check for valid email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  }
  return true;
}

//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

// check the type of the request being sent to server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  session_start();
  // first validation is to check that all the fields were set
  if (isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['country']) && isset($_POST['gender'])) {
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];

    // now we can do the proper server side validation using our defined function
    if (validateForm($username, $password, $email, $country, $gender)) {
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
        header("Location: /Project_Part_3/user_registration.php");
        die();
      }
      // successfull connection
      else {
        $checkIfUserExistsSql = "SELECT * FROM `users` WHERE username='" . $username . "'";
        $result = $conn->query($checkIfUserExistsSql);

        // if result rows is greater than 0, means there is already user with username in database
        if ($result->num_rows > 0) {
          // store a flash message as session variable
          if (isset($_SESSION["flash-error"])) {
            unset($_SESSION["flash-error"]);
          }

          $_SESSION["flash-error"] = ["message" => "Username " . $username . " already exists!"];
          header("Location: /Project_Part_3/user_registration.php");
          die();
        }
        // otherwise, we save the user in our database
        else {
          $addUserSql = "INSERT INTO `users` (`username`, `password`, `email`, `country`, `gender`) VALUES ('$username', '$password', '$email', '$country', '$gender')";

          // if successfully added to database, store success flash message in session and redirect back to sign up
          if ($conn->query($addUserSql) === TRUE) {
            // store a flash message as session variable
            if (isset($_SESSION["flash-success"])) {
              unset($_SESSION["flash-success"]);
            }
            $_SESSION["flash-success"] = ["message" => "Successfully registered user " . $username . ". Welcome to Moila, please log in to utilize our site!"];
            header("Location: /Project_Part_3/user_registration.php");
            die();
          }
          // else, store error flash message in session and redirect back to sign up
          else {
            // store a flash message as session variable
            if (isset($_SESSION["flash-error"])) {
              unset($_SESSION["flash-error"]);
            }
            $_SESSION["flash-error"] = ["message" => "There was an error saving registered user to database!"];
            header("Location: /Project_Part_3/user_registration.php");
            die();
          }
        }
      }
    } else {
      // store error flash message as session variable
      if (isset($_SESSION["flash-error"])) {
        unset($_SESSION["flash-error"]);
      }
      $_SESSION["flash-error"] = ["message" => "The form contains invalid fields! Please try again..."];
      header("Location: /Project_Part_3/user_registration.php");
      die();
    }
  }
} else {
  if (isset($_SESSION["flash-error"])) {
    unset($_SESSION["flash-error"]);
  }
  $_SESSION["flash-error"] = ["message" => "Invalid request method! Please try again..."];
  header("Location: /Project_Part_3/user_registration.php");
  die();
}
