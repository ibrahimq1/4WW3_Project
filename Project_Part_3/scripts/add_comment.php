<?php
//load the dotenv helper file
include "DotEnv.php";
(new DotEnv(__DIR__ . "/.env"))->load();

session_start();
// check request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
