<?php
// Include config file to get database connection
include('../config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get student details from the form
    $banner_number = $_POST['banner_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Create connection
    $conn = getDBConnection();

    // Prepare SQL query to update student details
    $sql = "UPDATE students 
            SET first_name = ?, last_name = ?, email = ? 
            WHERE banner_number = ?";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $banner_number);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Student details updated successfully!";
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
}
?>
