<?php
global $conn;
include 'db_connection.php';

$confirmation_id = $_POST['confirmation_id'];

$sql = "SELECT * FROM reservation WHERE confirmation_id = '$confirmation_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $id = $row['room_id'];
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $check_in = $row['check_in'];
  $check_out = $row['check_out'];

  $sql = "SELECT * FROM room WHERE id = '$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $room_type = $row['type'];
?>

    <p>Confirmation ID: <?php echo $confirmation_id ?> </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="room_type">Room Type</label><br>
    <select id="room_type" name="room_type" required>
        <option value="family" <?php if ($room_type == 'family') { ?>selected="true" <?php }; ?> >Family</option>
        <option value="executive" <?php if ($room_type == 'executive') { ?>selected="true" <?php }; ?> >Executive</option>
        <option value="deluxe" <?php if ($room_type == 'deluxe') { ?>selected="true" <?php }; ?> >Deluxe</option>
        <option value="standard" <?php if ($room_type == 'standard') { ?>selected="true" <?php }; ?> >Standard</option>
    </select><br>
    <label for="fname">First Name</label><br>
    <input type="text" id="fname" name="fname" value="<?php echo $fname?>"><br>
    <label for="lname">Last Name</label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $lname?>"><br>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" value="<?php echo $email?>"><br>
    <label for="phone">Phone Number</label><br>
    <input type="text" id="phone" name="phone" value="<?php echo $phone?>"><br>
    <label for="check-in">Check-in</label> <br>
    <input type="date" id="check-in" name="check-in" value="<?php echo $check_in?>"><br>
    <label for="check-out">Check-out</label> <br>
    <input type="date" id="check-out" name="check-out" value="<?php echo $check_out?>"><br><br>
    <input type="button" id="submit_edit" value="Edit Reservation">

<?php
} else {
    echo "<p>Confirmation code not found!</p>";
}
?>


