<?php


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
      $dbhost = getenv("DB_HOST");
      echo "database host is " . $dbhost;
    } else {
      echo "Form contains invalid fields!";
    }
  }
} else {
  echo "Invalid request method!";
}
