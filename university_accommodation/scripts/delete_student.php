<?php
// Include config file to get database connection
include('../config.php');

// Check if the banner number is provided
if (isset($_GET['banner_number'])) {
    $banner_number = $_GET['banner_number'];

    // Create connection
    $conn = getDBConnection();

    // Prepare SQL query to delete the student record
    $sql = "DELETE FROM students WHERE banner_number = ?";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $banner_number);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Student record deleted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "No banner number provided!";
}
?>
