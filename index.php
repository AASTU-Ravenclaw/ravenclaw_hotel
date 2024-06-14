<?php
global $conn;
include 'db_connection.php';

if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
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
  <link rel="stylesheet" href="css/header_footer_style.css">

  <link rel="icon" href="favicon.ico" sizes="any">
  <link rel="icon" href="icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="icon.png">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
        function validateForm() {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const rating = document.getElementById('rating').value;
            const title = document.getElementById('title').value.trim();
            const namePattern = /^[a-zA-Z\s]+$/;
            const titlePattern = /^.{5,}$/;
            if (!namePattern.test(firstName)) {
                alert('First Name must contain only letters and spaces.');
                return false;
            }
            if (!namePattern.test(lastName)) {
                alert('Last Name must contain only letters and spaces.');
                return false;
            }
            if (rating < 1 || rating > 5) {
                alert('Rating must be between 1 and 5.');
                return false;
            }
            if (!titlePattern.test(title)) {
                alert('Title must be at least 5 characters long.');
                return false;
            }
            return true;
        }
    </script>
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
      <div>
        <h1>Kick off the summer with fun in the sun</h1>
        <p>Summer’s too short for ordinary plans. Make it epic with an extraordinary stay.</p>
        <div><a id="reservation" href="reservation.php"> Reserve a spot</a></div>
        <img src="img/main.avif" width="50px">
      </div>

      <div>
        <h1>Reviews</h1>
        <form method="post" action="review.php" onsubmit="return validateForm()">
          <label for="first_name">First Name:</label>
          <input type="text" name="first_name" id="first_name" required>
          <label for="last_name">Last Name:</label>
          <input type="text" name="last_name" id="last_name" required><br>
          <label for="rating">Rating:</label>
          <input type="number" name="rating" id="rating" min="1" max="5" required><br>
          <label for="title">Title:</label>
          <input type="text" name="title" id="title" required><br>
          <label for="description">Description:</label><br>
          <textarea id="description" name="description" cols="60" rows="4"></textarea><br>
          <input type="submit" id="submit_review" value="Submit">
        </form>
        <br>
      </div>
      <hr>
      <div>
        <div id="reviews">
            <?php
            $sql = "SELECT * FROM review LIMIT 5";
            $result = $conn -> query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<div class='review-entry'>";
                echo "<p class='review-name'>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</p>";
                echo "<p class='review-date'>" . htmlspecialchars($row['date']) . "</p>";
                echo "<p class='review-rating'>";
                for ($i = 0; $i < 5; $i++) {
                    if ($i < $row['rating']) {
                        echo "★";
                    } else {
                        echo "☆";
                    }
                }
                echo "</p>";
                echo "<p class='review-title'>" . htmlspecialchars($row['title']) . "</p>";
                echo "<p class='review-description'>" . htmlspecialchars($row['description']) . "</p>";
                echo "</div>";
            }
            } else {
                echo "<p>No reviews</p>";
            }
            ?>
        </div>
        <hr>
        <button id="extend">See More Comments ></button>
      </div>
    </main>
    <footer>
    </footer>
  </div>
</body>
</html>