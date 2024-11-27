<?php
// Include config file to get database connection
include('config.php');

// Create connection
$conn = getDBConnection();

// Prepare SQL query to fetch all lease details
$sql = "SELECT leases.lease_number, students.first_name, students.last_name, rooms.room_number, leases.start_date, leases.end_date 
        FROM leases 
        JOIN students ON leases.student_id = students.banner_number
        JOIN rooms ON leases.place_number = rooms.place_number";

// Execute the query
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<h1>Leases</h1>";
    echo "<table border='1'>
            <tr>
                <th>Lease Number</th>
                <th>Student Name</th>
                <th>Room Number</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>";

    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['lease_number'] . "</td>
                <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
                <td>" . $row['room_number'] . "</td>
                <td>" . $row['start_date'] . "</td>
                <td>" . $row['end_date'] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No leases found.";
}

// Close connection
$conn->close();
?>
