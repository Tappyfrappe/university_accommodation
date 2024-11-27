<?php
// Include config file to get database connection
include('../config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get lease details from the form
    $lease_number = $_POST['lease_number'];
    $duration_in_semesters = $_POST['duration_in_semesters'];
    $student_id = $_POST['student_id'];
    $place_number = $_POST['place_number'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Create connection
    $conn = getDBConnection();

    // Prepare SQL query to insert lease data
    $sql = "INSERT INTO leases (lease_number, duration_in_semesters, student_id, place_number, start_date, end_date) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iiisss", $lease_number, $duration_in_semesters, $student_id, $place_number, $start_date, $end_date);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New lease record created successfully!";
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
    <title>Add Lease</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Add Lease Information</h1>
    <form method="POST" action="add_lease.php">
        <label for="lease_number">Lease Number:</label>
        <input type="text" id="lease_number" name="lease_number" required><br>

        <label for="duration_in_semesters">Duration (in semesters):</label>
        <input type="number" id="duration_in_semesters" name="duration_in_semesters" required><br>

        <label for="student_id">Student Banner Number:</label>
        <input type="text" id="student_id" name="student_id" required><br>

        <label for="place_number">Place Number:</label>
        <input type="text" id="place_number" name="place_number" required><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date"><br>

        <input type="submit" value="Add Lease">
    </form>

    <a href="index.php">Back to Home</a>
</body>
</html>
