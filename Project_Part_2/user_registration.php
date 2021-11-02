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

</head>


</head>

<body>
  <!-- Navigation Bar [will seperate later] no js allowed, so didn't implement hamburger menu-->

  <header class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex">
				<picture>
					<source media="(min-width: 800px)" srcset="assets/img/basketball-ball.png, assets/img/basketball-ball-2x.png">
					<source media="(min-width: 450px)" srcset="assets/img/basketball-ball-256.png, assets/img/basketball-ball-256-2x.png">
					<img class="logoimg" width="100%" height="100%" src="assets/img/basketball-ball.png" srcset="assets/img/basketball-ball-256.png" alt="moila basketball logo image">
				</picture>
        <h1><a class="logotxt" href="#">Moila</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/Project_Part_2/"> Search</a></li>
          <li><a href="/Project_Part_2/search_results.php"> Results </a></li>
          <li><a href="/Project_Part_2/individual_court.php"> Example Individual Object </a></li>
          <li><a href="/Project_Part_2/court_submission.php"> Submit New Court </a></li>
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
      <div class="container">
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
              <button class="btn btn-lg btn-dark btn-block" id="pinkbg" type="submit">Sign Up</button>
            </div>

          </form>
        </div>
      </div>
    </section>

      <!-- Footer [will sepearte later]-->
      <footer id="footer" class="">
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