<?php
include 'db_connection.php';

$count = $_POST['count'];
$sql = "SELECT * FROM review LIMIT $count";
$result = mysqli_query($GLOBALS['conn'], $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
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