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
    <form id="reservation_form" method="post" action="review.php">
        <label for="room_type">Room Type</label><br>
        <select id="room_type" name="room_type" required>
            <option value="family">Family</option>
            <option value="executive">Executive</option>
            <option value="deluxe">Deluxe</option>
            <option value="standard">Standard</option>
        </select><br>
        <label for="first_name" >First Name</label><br>
        <input type="text" id="first_name" name="first_name" value="<?php if(isset($_SESSION['first_name'])) echo $_SESSION['first_name'];?>"><br>
        <label for="last_name">Last Name</label><br>
        <input type="text" id="last_name" name="last_name"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="phone">Phone Number</label><br>
        <input type="text" id="phone" name="phone"><br>
        <label for="check-in">Check-in</label> <br>
        <input type="date" id="check-in" name="check-in"><br>
        <label for="check-out">Check-out</label> <br>
        <input type="date" id="check-out" name="check-out"><br><br>
      <button id="payment" type="submit">Proceed to Payment</button><br>
    </form>
</div>
</body>
</html>