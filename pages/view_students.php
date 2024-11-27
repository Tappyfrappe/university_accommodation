<?php
// Include config file to get database connection
include('config.php');

// Create connection
$conn = getDBConnection();

// Prepare SQL query to fetch all student details
$sql = "SELECT banner_number, first_name, last_name, email FROM students";

// Execute the query
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<h1>Students</h1>";
    echo "<table border='1'>
            <tr>
                <th>Banner Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>";

    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['banner_number'] . "</td>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['email'] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No students found.";
}

// Close connection
$conn->close();
?>
