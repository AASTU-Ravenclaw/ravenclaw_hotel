<?php
  include 'paypal.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotels by RavenClaw</title>
    <link rel="stylesheet" href="css/reservation_style.css">

    <link rel="icon" href="favicon.ico" sizes="any">
    <link rel="icon" href="icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="icon.png">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
<script src="js/app.js"></script>
<div id="Book" class="tabcontent">
    <h2>Book Reservation</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="room_type">Room Type</label><br>
        <select id="room_type" name="room_type" required>
            <option value="family">Family</option>
            <option value="executive">Executive</option>
            <option value="deluxe">Deluxe</option>
            <option value="standard">Standard</option>
        </select><br>
        <label for="fname">First Name</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last Name</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="phone">Phone Number</label><br>
        <input type="text" id="phone" name="phone"><br>
        <label for="check-in">Check-in</label> <br>
        <input type="date" id="check-in" name="check-in"><br>
        <label for="check-out">Check-out</label> <br>
        <input type="date" id="check-out" name="check-out"><br><br>
        <div class="paypal">
          <button type="submit" name="paypal"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></button>
          <span style="font-family: wingdings,serif; font-size: 200%;">&#252;</span>
        </div>
        <input type="button" id="submit" value="Book Reservation">
    </form>
</div>
</body>
</html>
