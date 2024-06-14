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
<script>
    function validateForm() {
        const roomType = document.getElementById('room_type').value;
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const checkInDate = document.getElementById('check-in').value;
        const checkOutDate = document.getElementById('check-out').value;
        const today = new Date().toISOString().split('T')[0];

        const namePattern = /^[a-zA-Z\s]+$/;
        const phonePattern = /^\d+$/;

        if (!roomType) {
            alert('Please select a room type.');
            return false;
        }
        if (!namePattern.test(firstName)) {
            alert('First Name must contain only letters and spaces.');
            return false;
        }
        if (!namePattern.test(lastName)) {
            alert('Last Name must contain only letters and spaces.');
            return false;
        }
        if (!email) {
            alert('Email is required.');
            return false;
        }
        if (!phonePattern.test(phone)) {
            alert('Phone Number must contain only digits.');
            return false;
        }
        if (checkInDate < today) {
            alert('Check-in date must be today or a future date.');
            return false;
        }
        if (checkOutDate <= checkInDate) {
            alert('Check-out date must be after the check-in date.');
            return false;
        }

        return true;
    }
</script>
<div id="Book" class="tabcontent">
    <h2>Book Reservation</h2>
    <form id="reservation_form" method="post" action="review.php" onsubmit="return validateForm()">
        <label for="room_type">Room Type</label><br>
        <select id="room_type" name="room_type" required>
            <option value="family">Family</option>
            <option value="executive">Executive</option>
            <option value="deluxe">Deluxe</option>
            <option value="standard">Standard</option>
        </select><br>
        <label for="first_name" >First Name</label><br>
        <input type="text" id="first_name" name="first_name" value="<?php if(isset($_SESSION['first_name'])) echo $_SESSION['first_name'];?>" required><br>
        <label for="last_name">Last Name</label><br>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone Number</label><br>
        <input type="text" id="phone" name="phone" required><br>
        <label for="check-in">Check-in</label> <br>
        <input type="date" id="check-in" name="check-in" required><br>
        <label for="check-out">Check-out</label> <br>
        <input type="date" id="check-out" name="check-out" required><br><br>
      <button id="payment" type="submit">Proceed to Payment</button><br>
    </form>
</div>
</body>
</html>