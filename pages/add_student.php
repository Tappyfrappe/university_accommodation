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

    // Prepare SQL query to insert student data
    $sql = "INSERT INTO students (banner_number, first_name, last_name, email) VALUES (?, ?, ?, ?)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $banner_number, $first_name, $last_name, $email);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New student record created successfully!";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Add New Student</h1>
    <form method="POST" action="add_student.php">
        <label for="banner_number">Banner Number:</label>
        <input type="text" id="banner_number" name="banner_number" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Add Student">
    </form>

    <a href="index.php">Back to Home</a>
</body>
</html>
