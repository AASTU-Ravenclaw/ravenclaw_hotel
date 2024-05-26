<?php
session_start();
include 'db_connection.php';

if (isset($_SESSION['username'])) {
    header("Location: admin.php");
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotels by RavenClaw</title>
  <link rel="stylesheet" href="css/index_style.css">

  <link rel="icon" href="favicon.ico" sizes="any">
  <link rel="icon" href="icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="icon.png">
</head>

<body>
  <script src="js/app.js"></script>

  <header>
    <div class="header-nav">
      <div>
        <img src="/img/main.avif" alt="logo">
      </div>

      <div>
        <a href="login.php">Sign In</a>
        <a href="find_stay.php">Find Stay</a>
      </div>
    </div>

    <div class="header-nav">
      <a href="services.php">Services</a>
      <a href="about.php">About</a>
    </div>
  </header>

  <main>
    <div>
        <img src="img/main.avif">
        <h1>Kick off the summer with fun in the sun</h1>
        <p>Summer’s too short for ordinary plans. Make it epic with an extraordinary stay.</p>
    </div>
    <div>
      <h1>Recent Reviews</h1>
      <?php

      ?>
    </div>
    <div>
      <form>
        <input type="text">
      </form>
    </div>

  </main>

  <footer>
  </footer>
</body>

</html>



