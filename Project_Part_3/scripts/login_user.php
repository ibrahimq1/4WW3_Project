<?php
//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

session_start();
// check request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['userName'];
  $password = $_POST['password'];

  // check to see that form inputs are not empty
  if (isset($username) && isset($password) && !empty($username) && !empty($password)) {

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
      header("Location: /Project_Part_3/login.php");
      die();
    } else {
      // first we query whether or not the user exists in the database
      $userExistsSql = "SELECT * FROM `users` WHERE username='" . $username . "'";
      $result = $conn->query($userExistsSql);

      // if result rows is <= 0, that means user doesn't exist in database
      if (!$result->num_rows > 0) {
        // store a flash message as session variable
        if (isset($_SESSION["flash-error"])) {
          unset($_SESSION["flash-error"]);
        }

        $_SESSION["flash-error"] = ["message" => "Username " . $username . " does not exist, please try again!"];
        header("Location: /Project_Part_3/login.php");
        die();
      }
      // if user exists, we then query and check if passwords match
      else {
        $passwordInDatabaseSql = "SELECT `password` FROM `users` WHERE username='" . $username . "' AND password='" . $password . "'";
        $result = $conn->query($passwordInDatabaseSql);

        // if we get result, that means that password matches username
        if ($result->num_rows > 0) {

          // save username in session so that it can be displayed on header
          $_SESSION['username'] = $username;
          $_SESSION['userLoggedIn'] = true;

          // if remember me was checked, we set two cookies to use to remember and prepopulate login
          // with username and have the rememberMe checkbox checked
          if (isset($_POST['rememberMe']) && !empty($_POST['rememberMe'])) {
            setcookie('rememberMe', true, time() + (86400 * 30), "/");
            setcookie('username', $username, time() + (86400 * 30), "/");
          }
          // if remember me wasn't checked, we unset the cookies that might have been saved if it was checked
          // from previous login

          else {
            setcookie('rememberMe', true, 1, "/");
            setcookie('username', $username, 1, "/");
          }

          // now redirect to home page, with success flash message being set
          if (isset($_SESSION["flash-success"])) {
            unset($_SESSION["flash-success"]);
          }
          $_SESSION["flash-success"] = ["message" => "Successfully logged in as user " . $username];
          header("Location: /Project_Part_3/");
          die();
        }
        // case where password is incorrect, we set flash message
        else {
          if (isset($_SESSION["flash-error"])) {
            unset($_SESSION["flash-error"]);
          }
          $_SESSION["flash-error"] = ["message" => "Password is incorrect! Please try again..."];
          header("Location: /Project_Part_3/login.php");
          die();
        }
      }
    }
  }
}
// invalid request method
else {
  if (isset($_SESSION["flash-error"])) {
    unset($_SESSION["flash-error"]);
  }
  $_SESSION["flash-error"] = ["message" => "Invalid request method! Please try again..."];
  header("Location: /Project_Part_3/login.php");
  die();
}
