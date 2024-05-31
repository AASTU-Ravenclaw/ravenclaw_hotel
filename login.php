<?php
session_start();
include 'db_connection.php';
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
</head>

<body>
    <script src="js/app.js"></script>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="username">User Name</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="password">Password</label><br>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="submit">
    </form>
</body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_system";
$admin_username = $admin_password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = test_input($_POST["username"]);
    $admin_password = test_input($_POST["password"]);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT username, password, first_name, last_name FROM admin";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["username"] == $admin_username && $row["password"] == $admin_password) {
          $_SESSION['username'] = $row['username'];
          $_SESSION['password'] = $row['password'];
          $_SESSION['first_name'] = $row['first_name'];
          $_SESSION['last_name'] = $row['last_name'];
          header("Location: admin.php");
      }
    }
    echo 'incorrect pass';
    mysqli_close($conn);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

?>
