<?php
session_start();

session_unset();

session_destroy();
// now redirect to home page, with success flash message being set
if (isset($_SESSION["flash-success"])) {
  unset($_SESSION["flash-success"]);
}
session_start();
$_SESSION["flash-success"] = ["message" => "Successfully logged out! "];
header("Location: /Project_Part_3/");
die();
