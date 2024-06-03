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
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
<div class="wrapper">
  <script src="js/app.js"></script>
  <header>
    <div class="header-nav">
      <div>
        <a href="index.php">
          <img src=
               "https://media.geeksforgeeks.org/wp-content/uploads/geeksforgeeks-13.png"
               alt="Click to visit geeksforgeeks.org">
        </a>
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
  <hr style="padding: 0">
  <main>
    <form>
      <input type="text">
      <input type="submit" id="find_stay_btn" value="Find Reservations">
    </form>
    <div id="result">

    </div>
    <button id="print">Print</button>
  </main>
</div>
</body>
