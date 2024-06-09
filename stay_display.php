<?php
include 'db_connection.php';
global $conn;

$confirmation_id = $_POST['confirmation_id'];
$sql = "SELECT * FROM reservation WHERE confirmation_id = '$confirmation_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {
        echo "<p>" . $row['first_name'] . "</p>";
        echo "<p>" . $row['last_name'] . "</p>";
        echo "<p>" . $row['email'] . "/5</p>";
        echo "<p>" . $row['phone'] . "</p>";
        echo "<p>" . $row['room_id'] . "</p>";
    }
} else {
    echo "<p>Confirmation code not found!</p>";
}
?>