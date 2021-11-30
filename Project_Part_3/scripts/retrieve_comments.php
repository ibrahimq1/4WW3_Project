<?php
//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();
session_start();

// check for proper request
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET['courtId'])) {
    if (!empty($_GET['courtId'])) {

      $courtId = $_GET['courtId'];

      // create DB connection using secrets in .env file
      $databasename = getenv('DB_NAME');
      $dbhost = getenv('DB_HOST');
      $dbuser = getenv('DB_USER');
      $dbpassword = getenv('DB_PASSWORD');
      $conn = new mysqli($dbhost, $dbuser, $dbpassword, $databasename);

      // error connecting to database
      if ($conn->connect_error) {
        $response['response_status'] = 'error';
        $response['response_code'] = "400 Bad Request";
        $response['response_description'] = "There was an error connecting to the database!";
        echo json_encode($response);
        die();
      }

      // successfull connection
      else {
        $retrieveCommentsSql = "SELECT * FROM comments WHERE courtId=" . $courtId;
        // successfully retrieve comments from database
        if ($result = $conn->query($retrieveCommentsSql)) {
          $response['response_status'] = 'success';
          $response['response_code'] = "200 OK";
          $response['response_description'] = "Successfully retrieved comments from courtId=" . $courtId;

          $array = array();

          // loop through result object, populate array with rows
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
          }

          $response['data'] = $array;
        }
        // when there's error retrieving comments from database, return error response
        else {
          $response['response_status'] = 'error';
          $response['response_code'] = "400 Bad Request";
          $response['response_description'] = "Error: " . $retrieveCommentsSql . "<br>" . $conn->error;
        }
        $conn->close();
        echo json_encode($response);
      }
    }
  }
}

// invalid request type
else {
  $response['response_status'] = 'error';
  $response['response_code'] = "400 Bad Request";
  $response['response_description'] = "invalid access";
  echo json_encode($response);
}
