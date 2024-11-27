<?php
// Include config file to get database connection (if needed)
include('../config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Accommodation - Home</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Welcome to the University Accommodation Office</h1>
    <p>Manage student accommodation, leases, and more!</p>

    <nav>
        <ul>
            <li><a href="view_students.php">View Students</a></li>
            <li><a href="add_student.php">Insert New Student</a></li>
            <li><a href="update_student.php">Update Student</a></li> <!-- Example banner number for testing -->
            <li><a href="../scripts/delete_student.php">Delete Student</a></li> <!-- Example banner number for testing -->
            <li><a href="view_leases.php">View Leases</a></li>
            <li><a href="view_apartment_inspections.php">View Apartment Inspections</a></li>
        </ul>
    </nav>

    <footer>
        <p>&copy; 2024 University Accommodation Office</p>
    </footer>
</body>
</html>
