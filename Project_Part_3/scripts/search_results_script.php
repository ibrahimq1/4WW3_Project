<?php
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

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

// check for $_SESSION['courtsToDisplay]: if it is set, it means we were redirected from search query
if (isset($_SESSION["courtsToDisplay"])) {
    $courtIdArray = $_SESSION["courtsToDisplay"];
    unset($_SESSION["courtsToDisplay"]);
    // first have to convert php array to sql array
    $sqlArray = "(";
    for ($i = 0; $i < count($courtIdArray); $i++) {
        if ($i === count($courtIdArray) - 1) {
            $sqlArray = $sqlArray . $courtIdArray[$i];
        } else {
            $sqlArray = $sqlArray . $courtIdArray[$i] . ",";
        }
        if ($i === count($courtIdArray) - 1) {
            $sqlArray = $sqlArray . ")";
        }
    }
    $sql = "SELECT * FROM submitted_courts WHERE id in " . $sqlArray;
}

// otherwise, we just load all of the courts from the database
else {
    $sql = "SELECT * FROM submitted_courts";
}

$result = $conn->query($sql);

//echo "<pre>";
//print_r($result->fetch_assoc());
