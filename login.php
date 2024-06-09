<?php
global $conn;
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="username">User Name</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="password">Password</label><br>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="submit">
    </form>
</body>

<?php

$admin_username = $admin_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = test_input($_POST["username"]);
    $admin_password = test_input($_POST["password"]);

    $sql = "SELECT username, password, first_name, last_name FROM admin";
    $result = $conn->query($sql);

    while ($row = $result-> fetch_assoc()) {
      if ($row["username"] == $admin_username && $row["password"] == $admin_password) {
          setcookie("username", $row['username'], time() + (86400 * 30), "/");
          setcookie("password", $row['password'], time() + (86400 * 30), "/");
          setcookie("firstname", $row['first_name'], time() + (86400 * 30), "/");
          setcookie("lastname", $row['last_name'], time() + (86400 * 30), "/");
          header("Location: admin.php");
      }
    }
    echo 'incorrect pass';
    $conn->close();
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

?>
