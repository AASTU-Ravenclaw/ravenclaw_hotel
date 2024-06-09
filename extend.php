<?php
global $conn;
include 'db_connection.php';


$count = $_POST['count'];
$sql = "SELECT * FROM review LIMIT $count";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {
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