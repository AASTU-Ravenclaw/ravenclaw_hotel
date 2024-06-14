<?php
include 'db_connection.php';
global $conn;

if (!isset($_COOKIE["username"]) && !isset($_COOKIE["password"])) {
    header("Location: login.php");
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
      function validateBookForm() {
        const firstName = document.getElementById('fname').value.trim();
        const lastName = document.getElementById('lname').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const checkInDate = document.getElementById('check-in').value;
        const checkOutDate = document.getElementById('check-out').value;
        const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

        const namePattern = /^[a-zA-Z\s]+$/;
        const phonePattern = /^\d+$/;

        if (!namePattern.test(firstName)) {
            alert('First Name must contain only letters and spaces.');
            return false;
        }

        if (!namePattern.test(lastName)) {
            alert('Last Name must contain only letters and spaces.');
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

    function validateAdminForm() {
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        const namePattern = /^[a-zA-Z\s]+$/;
        if (!namePattern.test(firstName)) {
            alert('First Name must contain only letters and spaces.');
            return false;
        }
        if (!namePattern.test(lastName)) {
            alert('Last Name must contain only letters and spaces.');
            return false;
        }
        if (!namePattern.test(username)) {
            alert('Username must contain only letters and spaces.');
            return false;
        }
        if (!email.includes('@')) {
            alert('Please enter a valid email address.');
            return false;
        }
        if (password.length < 6) {
            alert('Password must be at least 6 characters long.');
            return false;
        }
        return true;
    }
    </script>
</head>

  <body>
    <script src="js/admin_app.js"></script>
    <script src="js/tabbing.js"></script>
    <header>
      <div>
        <div class="logo">
          <a href="index.php">
            <img src= "icon.svg" width = "80"
                 alt="Click to visit geeksforgeeks.org">
          </a>
        </div>
        <div class= "header-nav">
          <a id="logout">Sign Out</a>
        </div>
      </div>
    </header>
    <main>
      <div>
        <h2>Welcome, <?php echo $_COOKIE['first_name'] . " " . $_COOKIE['last_name'] ?></h2>
      </div>
      <div class="tab">
        <button class="tablinks" onclick="openSetting(event, 'Book')">Book Reservation</button>
        <button class="tablinks" onclick="openSetting(event, 'Edit')">Edit Reservation</button>
        <button class="tablinks" onclick="openSetting(event, 'View')">View Reservation</button>
        <button class="tablinks" onclick="openSetting(event, 'Room')">View Rooms</button>
        <button class="tablinks" onclick="openSetting(event, 'Admin')">Add Admin</button>
        <button class="tablinks"  onclick="openSetting(event, 'Stats')">View Statistics</button>
      </div>

      <div id="Book" class="tabcontent">
        <h2>Book Reservation</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateBookForm()">
          <label for="room_type">Room Type</label><br>
          <select id="room_type" name="room_type" required>
            <option value="family">Family</option>
            <option value="executive">Executive</option>
            <option value="deluxe">Deluxe</option>
            <option value="standard">Standard</option>
          </select><br>
          <label for="fname">First Name</label><br>
          <input type="text" id="fname" name="fname" required><br>
          <label for="lname">Last Name</label><br>
          <input type="text" id="lname" name="lname" required><br>
          <label for="email">Email</label><br>
          <input type="email" id="email" name="email" required><br>
          <label for="phone">Phone Number</label><br>
          <input type="text" id="phone" name="phone" required><br>
          <label for="check-in">Check-in</label> <br>
          <input type="date" id="check-in" name="check-in" required><br>
          <label for="check-out">Check-out</label> <br>
          <input type="date" id="check-out" name="check-out" required><br><br>
          <input type="button" id="submit" value="Book Reservation">
        </form>
      </div>

      <div id="Edit" class="tabcontent">
        <h2>Edit Reservation</h2>
        <label for="confirmation_id">Enter Confirmation ID:</label>
        <input type="text" id="confirmation_id" required>
        <button id="search_confirmation_btn">Search Confirmation</button><br><br>
        <hr>
        <div id="edit_result">
        </div>
      </div>

      <div id="View" class="tabcontent">
        <h2>View Reservation</h2>
        <div id="printable_reservation">
          <table border="1" cellspacing="0" cellpadding="10">
            <tr>
              <th>Confirmation ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Room ID</th>
              <th>Check In </th>
              <th>Check Out</th>
            </tr>
              <?php
              $query = "SELECT * FROM reservation";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                  while($data = $result->fetch_assoc()) {
                      ?>
                    <tr>
                      <td><?php echo $data['confirmation_id']; ?> </td>
                      <td><?php echo $data['first_name']; ?> </td>
                      <td><?php echo $data['last_name']; ?> </td>
                      <td><?php echo $data['email']; ?> </td>
                      <td><?php echo $data['phone']; ?> </td>
                      <td><?php echo $data['room_id']; ?> </td>
                      <td><?php echo $data['check_in']; ?> </td>
                      <td><?php echo $data['check_out']; ?> </td>
                    <tr>
                  <?php }} else { ?>
                <tr>
                  <td colspan="8">No reservation found</td>
                </tr>
              <?php } ?>
          </table>
        </div>
        <br><button id="print_reservation">Print</button>
      </div>
      <div id="Room" class="tabcontent">
        <h2>View Rooms</h2>
        <div id="printable_room">
          <table border="1" cellspacing="0" cellpadding="10">
            <tr>
              <th>Room ID</th>
              <th>Room Type</th>
              <th>Room Price</th>
              <th>Room Status</th>
            </tr>
              <?php
              $query = "SELECT * FROM room";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                  while($data = $result->fetch_assoc()) {
                      ?>
                    <tr>
                      <td><?php echo $data['id']; ?> </td>
                      <td><?php echo $data['type']; ?> </td>
                      <td><?php echo $data['price']; ?> </td>
                      <td></td>
                    <tr>
                  <?php }} else { ?>
                <tr>
                  <td colspan="8">No Reservation found</td>
                </tr>
              <?php } ?>
          </table>
        </div>
        <br><button id="print_room">Print</button>
      </div>
      <div id="Admin" class="tabcontent">
        <h2>Add Admin</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateAdminForm()">
          <label for="first_name">First Name</label><br>
          <input type="text" id="first_name" name="first_name" required><br>
          <label for="last_name">Last Name</label><br>
          <input type="text" id="last_name" name="last_name" required><br>
          <label for="username">Username</label><br>
          <input type="text" id="username" name="username" required><br>
          <label for="email">Email</label><br>
          <input type="email" id="email" name="email" required><br>
          <label for="password">Password</label><br>
          <input type="password" id="password" name="password" required><br><br>
          <input type="submit" id="add_admin_btn" value="Add Admin">
        </form>
          <?php
          $username = $password = $first_name = $last_name = $email = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $username = test_input($_POST["username"]);
              $password = test_input($_POST["password"]);
              $first_name = test_input($_POST["first_name"]);
              $last_name = test_input($_POST["last_name"]);
              $email = test_input($_POST["email"]);
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Validate inputs
                $username = test_input($_POST["username"]);
                $password = test_input($_POST["password"]);
                $first_name = test_input($_POST["first_name"]);
                $last_name = test_input($_POST["last_name"]);
                $email = test_input($_POST["email"]);
            
                if (!preg_match("/^[a-zA-Z\s]+$/", $first_name)) {
                    echo "First Name must contain only letters and spaces.";
                } else if (!preg_match("/^[a-zA-Z\s]+$/", $last_name)) {
                    echo "Last Name must contain only letters and spaces.";
                } else if (!preg_match("/^[a-zA-Z0-9]{6,}$/", $username)) {
                    echo "Username must be at least 6 characters long and contain only letters and numbers.";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Invalid email format.";
                } else if (strlen($password) < 6) {
                    echo "Password must be at least 6 characters long.";
                } else {
                
                    $sql = "SELECT * FROM admin WHERE username = '$username'";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        echo "Username already exists. Please choose a different username.";
                    }
                    else {

                      $sql = "INSERT INTO  admin(username, password, first_name, last_name, email) VALUES ('$username', '$password', '$first_name', '$last_name', '$email')";

                      if ($conn->query($sql) === TRUE) {
                          echo "New record created successfully";
                      } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                    }
               }
              }
              $conn->close();
          }
          ?>
      </div>
      <div id="Stats" class="tabcontent">
        <h2>Statistics</h2>
        <div>
          <p>Amount of reservations - </p>
        </div>
        <button id="export_btn">Export</button>
      </div>
    </main>

    <footer>

    </footer>
  </body>
</html>

