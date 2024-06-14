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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
    <label for="room_type">Room Type</label><br>
    <select id="room_type" name="room_type" required>
        <option value="family" <?php if ($room_type == 'family') { ?>selected="true" <?php }; ?> >Family</option>
        <option value="executive" <?php if ($room_type == 'executive') { ?>selected="true" <?php }; ?> >Executive</option>
        <option value="deluxe" <?php if ($room_type == 'deluxe') { ?>selected="true" <?php }; ?> >Deluxe</option>
        <option value="standard" <?php if ($room_type == 'standard') { ?>selected="true" <?php }; ?> >Standard</option>
    </select><br>
    <label for="fname">First Name</label><br>
    <input type="text" id="fname" name="fname" value="<?php echo $fname?>" required><br>
    <label for="lname">Last Name</label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $lname?>" required><br>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" value="<?php echo $email?>" required><br>
    <label for="phone">Phone Number</label><br>
    <input type="text" id="phone" name="phone" value="<?php echo $phone?>" required><br>
    <label for="check-in">Check-in</label> <br>
    <input type="date" id="check-in" name="check-in" value="<?php echo $check_in?>" required><br>
    <label for="check-out">Check-out</label> <br>
    <input type="date" id="check-out" name="check-out" value="<?php echo $check_out?>" required><br><br>
    <input type="button" id="submit_edit" value="Edit Reservation">
    <script>
    function validateForm() {
        const firstName = document.getElementById('fname').value.trim();
        const lastName = document.getElementById('lname').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const checkInDate = document.getElementById('check-in').value;
        const checkOutDate = document.getElementById('check-out').value;
        const today = new Date().toISOString().split('T')[0]; 

        const namePattern = /^[a-zA-Z\s]+$/;
        const phonePattern = /^\d+$/;

        if (!namePattern.test(firstName)) {
            alert('First Name must contain only letters and spaces.');
            return false;
        }

        if (!namePattern.test(lastName)) {
            alert('Last Name must contain only letters and spaces.');
            return false;
        }

        if (!phonePattern.test(phone)) {
            alert('Phone Number must contain only digits.');
            return false;
        }
        if (checkInDate < today) {
            alert('Check-in date must be today or a future date.');
            return false;
        }
        if (checkOutDate <= checkInDate) {
            alert('Check-out date must be after the check-in date.');
            return false;
        }
        return true;
    }
    </script>

<?php
} else {
    echo "<p>Confirmation code not found!</p>";
}
?>


