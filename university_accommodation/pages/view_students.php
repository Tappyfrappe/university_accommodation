<?php
// Include config file to get database connection
include(__DIR__ . '/../config.php');

// Create connection
$conn = getDBConnection();

// Prepare SQL query to fetch all student details with adviser names
$sql = "SELECT 
            students.banner_number, 
            students.first_name, 
            students.last_name, 
            students.email, 
            students.home_address, 
            students.mobile_phone, 
            students.date_of_birth, 
            students.gender, 
            students.category, 
            students.nationality, 
            students.special_needs, 
            students.major, 
            students.minor, 
            advisers.full_name AS adviser_name 
        FROM students
        LEFT JOIN advisers ON students.adviser_id = advisers.adviser_id";

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
                <th>Home Address</th>
                <th>Mobile Phone</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Category</th>
                <th>Nationality</th>
                <th>Special Needs</th>
                <th>Major</th>
                <th>Minor</th>
                <th>Adviser</th>
                <th>Actions</th>
            </tr>";

    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['banner_number'] . "</td>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['home_address'] . "</td>
                <td>" . $row['mobile_phone'] . "</td>
                <td>" . $row['date_of_birth'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['category'] . "</td>
                <td>" . $row['nationality'] . "</td>
                <td>" . $row['special_needs'] . "</td>
                <td>" . $row['major'] . "</td>
                <td>" . $row['minor'] . "</td>
                <td>" . $row['adviser_name'] . "</td>
                <td><a href='update_student.php?banner_number=" . $row['banner_number'] . "'>Update</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No students found.";
}

// Close connection
$conn->close();
?>
