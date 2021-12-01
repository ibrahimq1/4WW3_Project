<?php
//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();
session_start();
$request_data = json_decode(file_get_contents("php://input"));

// check request method
if ($request_data) {
  // first check if user is logged in
  if (isset($_SESSION['userLoggedIn'])) {
    if (isset($request_data->rating) &&  isset($request_data->comment)) {
      $rating = $request_data->rating;
      $comment = $request_data->comment;
      $date = $request_data->date;

      // if rating was passed as string "Rating", means that no number was selected
      if ($rating === "Rating") {
        $response['response_status'] = 'error';
        $response['response_code'] = "400 Bad Request";
        $response['response_description'] = "You must include a rating with your review!";
        echo json_encode($response);
        die();
      }

      // if comment was passed as empty string, that means that the comment was blank
      if ($comment === "") {
        $response['response_status'] = 'error';
        $response['response_code'] = "400 Bad Request";
        $response['response_description'] = "You must include a comment with your review!";
        echo json_encode($response);
        die();
      }

      $courtId = $request_data->courtId;
      $username = $_SESSION['username'];

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
        $insertCommentSql = "INSERT INTO `comments` (`comment`, `rating`, `username`, `courtId`, `date`) VALUES ('$comment', '$rating', '$username', '$courtId', '$date')";

        // when there's error saving comment into database, return error response
        if (!$conn->query($insertCommentSql) === true) {
          $response['response_status'] = 'error';
          $response['response_code'] = "400 Bad Request";
          $response['response_description'] = "Error: " . $insertCommentSql . "<br>" . $conn->error;
        }
        // successful saving comment into database, we then need to update the rating of the submitted court associated
        // with the comment
        else {
          $getCurrentRatingSql = "SELECT rating from submitted_courts WHERE id=" . $courtId;

          // get the current rating of the court from
          if ($result = $conn->query($getCurrentRatingSql)) {
            while ($row = $result->fetch_row()) {
              $currentRating = $row[0];
            }

            // if rating was not set yet (court has no reviews), simply set the new rating
            if (empty($currentRating)) {
              $updateRatingSql = "UPDATE submitted_courts SET rating=" . $rating . " WHERE id=" . $courtId;
            }
            // otherwise, we have to take the rolling average and apply new rating
            else {
              $newRating = ($currentRating + $rating) / 2;
              $updateRatingSql = "UPDATE submitted_courts SET rating=" . $newRating . " WHERE id=" . $courtId;
            }
            if ($conn->query($updateRatingSql)) {
              $response['response_status'] = 'success';
              $response['response_code'] = "200 OK";
              $response['response_description'] = "New comment successfully added to database!";
            } else {
              $response['response_status'] = 'error';
              $response['response_code'] = "400 Bad Request";
              $response['response_description'] = "Error: " . $insertCommentSql . "<br>" . $conn->error;
            }
          }
        }
        $conn->close();
        echo json_encode($response);
      }
    }
  }
  // cannot add review if user is not logged in
  else {
    $response['response_status'] = 'error';
    $response['response_code'] = "400 Bad Request";
    $response['response_description'] = "You must be logged in to submit a basketball court!";
    echo json_encode($response);
  }
}
// invalid request, redirect back to individual court
else {
  $response['response_status'] = 'error';
  $response['response_code'] = "400 Bad Request";
  $response['response_description'] = "invalid access";
  echo json_encode($response);
}
