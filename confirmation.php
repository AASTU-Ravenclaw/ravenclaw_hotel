<?php
include 'db_connection.php';

mail($to, $subject, $message, $headers);
