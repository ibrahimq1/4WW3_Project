<!DOCTYPE html>
<!-- HTML5 Compliant -->
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

  <!-- external main CSS stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/user_registration.css" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
  <!-- Bootstrap Icon library -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Animate.css library !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Metadata -->
  <title>Moila</title>
  <meta charset="utf8" />
  <meta name="author" content="Quazi Rafid Ibrahim, Frank Su" />
  <meta name="description" content="CS 4WW3 Project Part 1" />
  <meta name="keywords" content="web,programming,McMaster,4ww3 Project" />

  <!-- Tell search engines not to index this page -->
  <meta name="robots" content="noindex" />

  <!-- favicon -->
  <link rel=icon typ="image/x-icon" href=favicon.ico>
  <!-- link to js file -->
  <script src="assets/js/formValidation.js"></script>

</head>


</head>

<body>
  <!-- header included from another file -->
  <?php include 'header.php'; ?>

  <!-- Login form content form content -->
  <section id="main" class="animate__animated animate__slideInDown">
    <!-- check to see if flash message is set, if so display it -->
    <?php
    if (isset($_SESSION["flash-error"])) {
      vprintf("<div class='alert alert-danger' style='text-align: center;'>%s</div>", $_SESSION["flash-error"]);
      unset($_SESSION["flash-error"]);
    }
    if (isset($_COOKIE['rememberMe'])) {
      $rememberUser = true;
    }
    ?>

    <!-- if user is already logged in, we don't show the login form -->
    <?php if (!isset($_SESSION['userLoggedIn'])) { ?>
      <div class="container">

        <h1 class="reg-header">Login</h1>

        <div class="reg-body">
          <form name="login" method="post" action="/Project_Part_3/scripts/login_user.php">
            <div class="form-group">
              <!-- if remember me was checked from previous login, prefill username with saved username from cookie -->
              <input class="form-control" type="text" name="userName" placeholder="Username" value="<?php if (isset($rememberUser)) {
                                                                                                      echo $_COOKIE['username'];
                                                                                                    } ?>"">
            <div id=" nameerror">
            </div>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="password" placeholder="Password">
          <div id="passerror"> </div>
        </div>
        <div class="form-group">
          <button class="btn btn-lg btn-dark btn-block" id="pinkbg" type="submit">Login</button>
        </div>
        <div class="form-group">

          <!-- if remember me was checked from previous login, have it remain checked -->
          <input type="checkbox" name="rememberMe" <?php if (isset($rememberUser)) {
                                                      echo 'checked="checked"';
                                                    } ?>>
          <label for="rememberMe">Remember Me</label>
        </div>
        </form>
      </div>
      </div>

      <!-- if user is logged in, show a banner saying you're logged in -->
    <?php } else {
      echo "<div class='alert alert-success' style='text-align: center;'>You are already logged in!</div>";
    } ?>
  </section>

  <!-- footer included from another file -->
  <?php include 'footer.php'; ?>

</body>

</html>



<!-- 
<div>Icons made by <a href="https://www.flaticon.com/authors/prettycons" title="prettycons">prettycons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
Video by Pavel Danilyuk from Pexels
-->