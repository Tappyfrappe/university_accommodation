<?php
// Include config file to get database connection
include('../config.php');

// Check if a student is selected for updating
if (isset($_GET['banner_number'])) {
    // Fetch the student details based on banner number
    $banner_number = $_GET['banner_number'];
    $conn = getDBConnection();
    
    // Prepare SQL query to fetch the student data
    $sql = "SELECT banner_number, first_name, last_name, email FROM students WHERE banner_number = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $banner_number);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($banner_number, $first_name, $last_name, $email);
            $stmt->fetch();
        } else {
            echo "No student found with that banner number.";
        }
        
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
    <title>Update Student</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Update Student</h1>

    <form method="POST" action="../scripts/update_student.php">
        <label for="banner_number">Banner Number:</label>
        <input type="text" id="banner_number" name="banner_number" value="<?php echo $banner_number ?? ''; ?>" readonly><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name ?? ''; ?>" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name ?? ''; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email ?? ''; ?>" required><br><br>

        <input type="submit" value="Update Student">
    </form>
</body>
</html>
