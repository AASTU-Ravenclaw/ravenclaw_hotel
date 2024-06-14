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
    <script>
      function validateForm() {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        const usernamePattern = /^[a-zA-Z0-9_]{6,}$/;

        if (!usernamePattern.test(username)) {
          alert('Username must be at least 6 characters long and contain only letters, numbers, and underscores.');
          return false;
        }
        if (password.length < 4) {
          alert('Password must be at least 4 characters long.');
          return false;
        }
        return true;
      }
    </script>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
      <label for="username">User Name</label><br>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Password</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" value="submit">
    </form>
</body>

<?php

$admin_username = $admin_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = test_input($_POST["username"]);
    $admin_password = test_input($_POST["password"]);
    
    $usernamePattern = "/^[a-zA-Z0-9_]{6,}$/";

    if (!preg_match($usernamePattern, $admin_username)) {
        echo 'Invalid username format. Username must be at least 6 characters long and contain only letters, numbers, and underscores.';
    } elseif (strlen($admin_password) < 4) {
        echo 'Invalid password format. Password must be at least 4 characters long.';
    } else {
        $sql = "SELECT username, password, first_name, last_name FROM admin";
        $result = $conn->query($sql);

        while ($row = $result-> fetch_assoc()) {
        if ($row["username"] == $admin_username && $row["password"] == $admin_password) {
            setcookie("username", $row['username'], time() + (86400 * 30), "/");
            setcookie("password", $row['password'], time() + (86400 * 30), "/");
            setcookie("first_name", $row['first_name'], time() + (86400 * 30), "/");
            setcookie("last_name", $row['last_name'], time() + (86400 * 30), "/");
            header("Location: admin.php");
        }
        }
        echo 'incorrect pass';
    }
    $conn->close();
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

?>
