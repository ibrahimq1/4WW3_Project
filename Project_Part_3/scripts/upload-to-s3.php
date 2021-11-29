<?php
// Help taking with actual connection to S3 and upload to the s3 bucket from -> Source = https://www.tutsmake.com/upload-file-to-aws-s3-bucket-in-php/

require '../vendor/autoload.php';
use Aws\S3\S3Client;

//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

// Instantiate an Amazon S3 client.
$s3Client = new S3Client([
    'version' => 'latest',
    'region'  => 'ca-central-1',
    'credentials' => [
    'key'    =>   getenv('S3_KEY'),
    'secret' =>  getenv('S3_SECRET')
]
]);

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["anyfile"]) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['name']) && isset($_POST['numberPlaying']) && isset($_POST['location']) && ($_FILES["anyfile"]["error"] == 0)){
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES["anyfile"]["name"];
    $filetype = $_FILES["anyfile"]["type"];
    $filesize = $_FILES["anyfile"]["size"];
    // Validate file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);


    

    $name = $_POST['name'];
    $description = $_POST['description'];
    $playerCount = $_POST['numberPlaying'];
    
    // splitting LAT LONG
    $location = $_POST['location'];
    $clean_space = str_replace(' ', '', $location);
    $split_loc = explode(',', $clean_space);
    $latitude = $split_loc[0];
    $longitude = $split_loc[1];
    $audioRef = '/' . $filename;
    //$user =  $_SESSION["username"];
    $userId = 1;
    // DB connect to store
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
        header("Location: /Project_Part_3/court_submission.php");
        die();
      }
      else { 
          //check if exists here [maybe depending on lat long]
          //image upload link https://4ww3-media.s3.ca-central-1.amazonaws.com/ ++ filename
          $addCourtSql = "INSERT INTO `submitted_courts` (`userId`, `name`, `description`, `playerCount`, `latitude`, `longitude`, `audioRef`, `videoRef`) VALUES ('$userId', '$name', '$description', $playerCount, $latitude, $longitude, '$audioRef', 'none')";
          if ($conn->query($addCourtSql) === TRUE) {
            echo "New record created successfully";
            header("Location: /Project_Part_3/court_submission.php");
          } else {
            echo "Error: " . $addCourtSql . "<br>" . $conn->error;
          }
          
          $conn->close();
      }

    if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
    if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

    // Validate type of the file
    if(in_array($filetype, $allowed)){
    // Check whether file exists before uploading it
        if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "upload/" . $filename)){
            $bucket = '4ww3-media';
            $file_Path = __DIR__ . '/upload/'. $filename;
            $key = basename($file_Path);
            try {
            $result = $s3Client->putObject([
            'Bucket' => $bucket,
            'Key'    => $key,
            'Body'   => fopen($file_Path, 'r'),
            'ACL'    => 'public-read', // make file 'public'
            ]);
            header("Location: /Project_Part_3/court_submission.php");

            
            //echo "Image uploaded successfully. Image path is: ". $result->get('ObjectURL');


            } catch (Aws\S3\Exception\S3Exception $e) {
            echo "There was an error uploading the file.\n";
            echo $e->getMessage();
            }
            //echo "Your file was uploaded successfully.";
            header("Location: /Project_Part_3/court_submission.php");

        }
    } 
    } else{
        echo "Error: There was a problem uploading your file. Please try again."; 
        }



    } else{
        echo "Error: " . $_FILES["anyfile"]["error"];
        }

?>