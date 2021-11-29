<!-- Navigation Bar -->
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
        <li><a href="/Project_Part_3/"> Search </a></li>
        <li><a href="/Project_Part_3/search_results.php"> Results </a></li>
        <li><a href="/Project_Part_3/individual_court.php"> Example Individual Object </a></li>
        <li><a href="/Project_Part_3/court_submission.php"> Submit New Court </a></li>
        <li class="login-btn"><a href="/Project_Part_3/user_registration.php"> Register </a></li>
        <?php session_start();
        if (!isset($_SESSION['userLoggedIn'])) {
        ?>
          <li class="login-btn"><a href="/Project_Part_3/login.php">Login</a></li>
        <?php } else { ?>
          <li class="login-btn"><a href="/Project_Part_3/scripts/logout_user.php">logout</a></li>
          <span class="float-end" style="color: white; margin-left: 50px; margin-right: 5px">Logged in as: <?php echo $_SESSION["username"]; ?></span>

        <?php } ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>
<!-- End Navigation Bar -->