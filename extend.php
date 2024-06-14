<?php
global $conn;
include 'db_connection.php';


$count = $_POST['count'];
$sql = "SELECT * FROM review LIMIT $count";
$result = $conn->query($sql);
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
