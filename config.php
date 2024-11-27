<?php
// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'username');  // Replace with your database username
define('DB_PASSWORD', 'password');  // Replace with your database password
define('DB_NAME', 'university_accommodation');  // Replace with your database name

// Site information
define('SITE_NAME', 'University Accommodation Office');
define('BASE_URL', 'http://localhost/university_accommodation_project');  // Adjust based on your project location

// Optionally, define other global settings you may need
define('DEFAULT_LANGUAGE', 'en');

// Include database connection
function getDBConnection() {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
