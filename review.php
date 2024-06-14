
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

    $namePattern = "/^[a-zA-Z\s]+$/";
    $titlePattern = "/^.{5,}$/";
    $errorMessages = [];

    if (!preg_match($namePattern, $first_name)) {
        $errorMessages[] = "First Name must contain only letters and spaces.";
    }
    if (!preg_match($namePattern, $last_name)) {
        $errorMessages[] = "Last Name must contain only letters and spaces.";
    }
    if (!is_numeric($rating) || $rating < 1 || $rating > 5) {
        $errorMessages[] = "Rating must be between 1 and 5.";
    }
    if (!preg_match($titlePattern, $title)) {
        $errorMessages[] = "Title must be at least 5 characters long.";
    }
    
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
