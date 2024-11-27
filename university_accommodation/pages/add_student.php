<?php
include('../config.php');
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
    <form action="../scripts/insert_student.php" method="POST">
        <label for="banner_number">Banner Number:</label>
        <input type="text" id="banner_number" name="banner_number" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="home_address">Home Address:</label>
        <input type="text" id="home_address" name="home_address" required><br>

        <label for="mobile_phone">Mobile Phone:</label>
        <input type="text" id="mobile_phone" name="mobile_phone" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required><br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br>

        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" required><br>

        <label for="special_needs">Special Needs:</label>
        <textarea id="special_needs" name="special_needs"></textarea><br>

        <label for="major">Major:</label>
        <input type="text" id="major" name="major" required><br>

        <label for="minor">Minor:</label>
        <input type="text" id="minor" name="minor"><br>

        <label for="adviser_id">Adviser:</label>
        <select name="adviser_id" id="adviser_id">
            <?php
            $conn = getDBConnection();
            $result = $conn->query("SELECT adviser_id, full_name FROM advisers");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['adviser_id'] . "'>" . $row['full_name'] . "</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Add Student">
    </form>

    <a href="index.php">Back to Home</a>
</body>
</html>
