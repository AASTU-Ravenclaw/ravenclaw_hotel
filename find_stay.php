<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotels by RavenClaw</title>
  <link rel="stylesheet" href="css/index_style.css">
  <link rel="stylesheet" href="css/header_footer_style.css">

  <link rel="icon" href="favicon.ico" sizes="any">
  <link rel="icon" href="icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="icon.png">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
<div class="wrapper">
  <script src="js/app.js"></script>
  <header>
      <div class="logo">
          <a href="index.php">
            <img src= "icon.svg"
                 width = "70"
                 alt="Hotels by Ravenclaw Logo"
                 href="index.php">
          </a>
      </div>

      <div class="header-nav">
      <ul>
        <li><a href="login.php">Sign In</a></li>
        <li><a href="find_stay.php">Find Stay</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      </div>
  </header>
  <main>
      <label for="confirmation_id">Enter Confirmation Code:</label><br>
      <input type="text" name="confirmation_id" id="confirmation_id" required>
      <input type="button" id="find_stay_btn" value="Find Reservations">
    <div id="printable_stay">
    </div>
    <button id="print_stay">Print</button>
  </main>
</div>
</body>
