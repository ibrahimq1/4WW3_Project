<?php

//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

// check the type of the request being sent to server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // first validation is to check that all the fields were set
  if (isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['country']) && isset($_POST['gender'])) {
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];

    // now we can do the proper server side validation
    // for username, it shouldn't have any whitespaces
    if (!empty($username) && !preg_match('/\s/', $username)) {
      // create DB connection
      $tablename = "users";
      $dbhost = getenv('DB_HOST');
      $dbuser = getenv('DB_USER');
      $dbpassword = getenv('DB_PASSWORD');
      echo $dbhost . "\n";
      echo $dbuser . "\n";
      echo $dbpassword . "\n";

      $conn = new mysqli($dbhost, $dbuser, $dbpassword, $tablename);
      if ($conn->connect_error) {
        echo "Error occured while connecting to database\n";
        echo $dbhost . "\n";
        echo $dbuser . "\n";
        echo $dbpassword . "\n";
      }
    } else {
      echo "Form contains invalid fields!";
    }
  }
} else {
  echo "Invalid request method!";
}
