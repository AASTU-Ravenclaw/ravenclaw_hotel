
<?php
include 'db_connection.php';
global $conn;

$first_name = $last_name = $date = $rating = $title = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = test_input($_POST["first_name"]);
    $last_name = test_input($_POST["last_name"]);
    $date = date("Y-m-d");
    $rating = test_input($_POST["rating"]);
    $title = test_input($_POST["title"]);
    $description = test_input($_POST["description"]);

    $sql = "INSERT INTO review (first_name, last_name, date, rating, title, description) VALUES ('$first_name','$last_name','$date','$rating','$title','$description')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("Location: index.php");
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>