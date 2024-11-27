<?php
// Database credentials
$servername = "localhost";  // or your database server
$username = "username";     // replace with your database username
$password = "password";     // replace with your database password
$dbname = "university_accommodation";  // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
