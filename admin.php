<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotels by RavenClaw</title>
    <link rel="stylesheet" href="css/admin_style.css">
    <link rel="stylesheet" href="css/header_footer_style.css">

    <link rel="icon" href="favicon.ico" sizes="any">
    <link rel="icon" href="icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="icon.png">
</head>

  <body>
    <script src="js/app.js"></script>
    <script src="js/tabbing.js"></script>

    <header>
      <div class="header-nav">
        <div>
          <img src="img/main.avif" width="50px" alt="logo">
        </div>
        <div>
          <a href="index.php" onclick="logout()" >Sign Out</a>
        </div>
      </div>
    </header>

    <div>
      <h2>Welcome, </h2>
    </div>
    <div class="tab">
      <button class="tablinks" onclick="openSetting(event, 'Book')">Book Reservation</button>
      <button class="tablinks" onclick="openSetting(event, 'Edit')">Edit Reservation</button>
      <button class="tablinks" onclick="openSetting(event, 'View')">View Reservation</button>
      <button class="tablinks" onclick="openSetting(event, 'Room')">View Rooms</button>
      <button class="tablinks" onclick="openSetting(event, 'Admin')">Add Admin</button>
    </div>

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
        <input type="button" id="submit" value="Book Reservation">
      </form>
    </div>

    <div id="Edit" class="tabcontent">
      <h2>Edit Reservation</h2>
      <form>

      </form>
    </div>

    <div id="View" class="tabcontent">
      <h2>View Reservation</h2>
      <form>

      </form>
    </div>
    <div id="Room" class="tabcontent">
      <h2>View Rooms</h2>
    </div>
    <div id="Admin" class="tabcontent">
      <h2>Add Admin</h2>
    </div>

    <footer>

    </footer>
  </body>
</html>

<?php

include 'db_connection.php';
// define variables and set to empty values
$first_name = $last_name = $email = $phone = $type = $check_in = $check_out = "";

if (isset($_POST['book_btn'])) {
    $first_name = test_input($_POST["fname"]);
    $last_name = test_input($_POST["lname"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $type = test_input($_POST["room_type"]);
    $check_in = test_input($_POST["check-in"]);
    $check_out = test_input($_POST["check-out"]);

    $sql = "INSERT INTO  reservation(first_name, last_name, email, phone, room_type, check_in, check_out)
VALUES ('','','','','','','')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }

    $GLOBALS['conn']->close();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>