<!DOCTYPE html>
<!-- HTML5 Compliant -->
<html>

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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Bootstrap Icon library -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Metadata -->
  <title>4WW3 Project - Part_1 - Home and Search</title>
  <meta charset="utf8" />
  <meta name="author" content="Quazi Rafid Ibrahim, Frank Su" />
  <meta name="description" content="CS 4WW3 Project Part 1" />
  <meta name="keywords" content="web,programming,McMaster,4ww3 Project" />

  <!-- Tell search engines not to index this page -->
  <meta name="robots" content="noindex" />

</head>

<body>
  <!-- Navigation Bar [will seperate later] no js allowed, so didn't implement hamburger menu-->

  <header class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="d-flex">
        <img class="logoimg" src="assets/img/basketball-ball.png"></img>
        <h1><a class="logotxt" href="#">Moila</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/Project_Part_1/"> Home </a></li>
          <li><a href="/Project_Part_1/search_results.php"> Search Courts </a></li>
          <li><a href="/Project_Part_1/individual_court.php"> Example Individual Object </a></li>
          <li><a href="/Project_Part_1/court_submission.php"> Submit New Court </a></li>
          <li class="login-btn"><a href="#"> Register </a></li>
          <li class="login-btn"><a href="#"> Login </a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>


  </header>
  <!-- End Navigation Bar -->

  <!-- Registration form content -->
  <section id="main">
    <div>
      <h1 class="reg-header">Sign Up</h1>
      <div class="reg-body">
        <form>
          <div class="form-group">
            <input class="form-control" type="text" name="userName" placeholder="Username">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="E-mail">
          </div>
          <div class="form-group">
            <label for="countries">Choose your Country:</label>
            <select id="countries" name="country">
              <option value="Canada">Canada</option>
              <option value="United States<">United States</option>
              <option value="China">China</option>
              <option value="Sweden">Sweden</option>
            </select>
            <label for="form-gender">Choose your gender</label>
            <div id="form-gender">
              <input type="radio" name="gender" value="male"> Male
              <input type="radio" name="gender" value="female"> Female
              <input type="radio" name="gender" value="other"> Other
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-lg btn-dark btn-block" id="pinkbg"type="submit">Sign Up</button>
          </div>

        </form>
      </div>
    </div>
    <section>

      <!-- Footer [will sepearte later]-->
      <footer id="footer" class="fixed-bottom">
        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong><span>Moila</span></strong>. All Rights Reserved - Designed by <a href="#">Quazi Rafid Ibrahim</a> & <a href="#">Frank Su</a>
          </div>
        </div>
      </footer>
      <!-- End Footer -->

</body>

</html>



<!-- 
<div>Icons made by <a href="https://www.flaticon.com/authors/prettycons" title="prettycons">prettycons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
Video by Pavel Danilyuk from Pexels
-->