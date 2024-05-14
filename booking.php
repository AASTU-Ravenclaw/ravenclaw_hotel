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
      <img src="/img/raven.png" alt="logo">
    </div>
    <div>
      <a href="login.php">Sign In</a>
      <a href="reservation.php">Find Stay</a>
    </div>
  </div>
  <div class="header-nav" style="justify-content: flex-start">
    <a style="padding: ">Services</a>
    <a>Locations</a>
    <a>About</a>
  </div>
</header>

<div class="body-div">
  <div class="front-div">
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
      <input type="submit" id="submit" value="Book Reservation" >
    </form>
  </div>
</div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_system";
// define variables and set to empty values
$first_name = $last_name = $email = $phone = $type = $check_in = $check_out = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = test_input($_POST["fname"]);
    $last_name = test_input($_POST["lname"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $type = test_input($_POST["room_type"]);
    $check_in = test_input($_POST["check-in"]);
    $check_out = test_input($_POST["check-out"]);


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO  reservation(first_name, last_name, email, phone, room_type, check_in, check_out)
VALUES ('','','','','','','')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>