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
    <hr>
    <main>
      <div>
        <img src="img/main.avif" width="50px">
        <h1>Kick off the summer with fun in the sun</h1>
        <p>Summer’s too short for ordinary plans. Make it epic with an extraordinary stay.</p>
        <a id="reservation" href="reservation.php"> Reserve a spot</a>
      </div>

      <div>
        <h1>Reviews</h1>
        <form method="post" action="review.php">
          <label for="first_name">First Name:</label>
          <input type="text" name="first_name" id="first_name">
          <label for="last_name">Last Name:</label>
          <input type="text" name="last_name" id="last_name"><br>
          <label for="rating">Rating:</label>
          <input type="number" name="rating" id="rating" min="1" max="5"><br>
          <label for="title">Title:</label>
          <input type="text" name="title" id="title"><br>
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
                    echo "<p>" . $row['first_name'] . "</p>";
                    echo "<p>" . $row['last_name'] . "</p>";
                    echo "<p>" . $row['date'] . "</p>";
                    echo "<p>" . $row['rating'] . "/5</p>";
                    echo "<p>" . $row['title'] . "</p>";
                    echo "<p>" . $row['description'] . "</p>";
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