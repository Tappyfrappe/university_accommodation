<?php
// Include config file to get database connection
include('../config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get student details from the form
    $banner_number = $_POST['banner_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $home_address = $_POST['home_address'];
    $mobile_phone = $_POST['mobile_phone'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $category = $_POST['category'];
    $nationality = $_POST['nationality'];
    $special_needs = $_POST['special_needs'];
    $major = $_POST['major'];
    $minor = $_POST['minor'];
    $adviser_id = $_POST['adviser_id'];

    // Create connection
    $conn = getDBConnection();

    // Prepare SQL query to insert student data
    $sql = "INSERT INTO students (banner_number, first_name, last_name, home_address, mobile_phone, email, date_of_birth, gender, category, nationality, special_needs, additional_comments, current_status, major, minor, adviser_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssssssssssss", $banner_number, $first_name, $last_name, $home_address, $mobile_phone, $email, $date_of_birth, $gender, $category, $nationality, $special_needs, $additional_comments, $current_status, $major, $minor, $adviser_id);

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
