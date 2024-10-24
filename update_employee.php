<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "employee_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch employee data
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>

<h2>Update Employee</h2>

<form action="process_update.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
    <label for="first_name">First Name:</label><br>
    <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required><br><br>

    <label for="last_name">Last Name:</label><br>
    <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <label for="country_code">Country Code:</label><br>
    <select id="country_code" name="country_code">
        <option value="+1" <?php if ($row['country_code'] == '+1') echo "selected"; ?>>+1 (USA)</option>
        <option value="+44" <?php if ($row['country_code'] == '+44') echo "selected"; ?>>+44 (UK)</option>
        <option value="+91" <?php if ($row['country_code'] == '+91') echo "selected"; ?>>+91 (India)</option>
        <!-- Add more country codes as needed -->
    </select><br><br>

    <label for="mobile">Mobile:</label><br>
    <input type="number" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" required><br><br>

    <label for="address">Address:</label><br>
    <textarea id="address" name="address" required><?php echo $row['address']; ?></textarea><br><br>

    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="Male" <?php if ($row['gender'] == 'Male') echo "checked"; ?>>
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="Female" <?php if ($row['gender'] == 'Female') echo "checked"; ?>>
    <label for="female">Female</label><br><br>

    <label>hobby:</label><br>
    <input type="checkbox" id="reading" name="hobby[]" value="Reading" <?php if (in_array('Reading', explode(',', $row['hobby']))) echo "checked"; ?>>
    <label for="reading">Reading</label><br>
    <input type="checkbox" id="sports" name="hobby[]" value="Sports" <?php if (in_array('Sports', explode(',', $row['hobby']))) echo "checked"; ?>>
    <label for="sports">Sports</label><br>
    <input type="checkbox" id="music" name="hobby[]" value="Music" <?php if (in_array('Music', explode(',', $row['hobby']))) echo "checked"; ?>>
    <label for="music">Music</label><br><br>

    <label>Current Photo:</label><br>
    <img src="uploads/<?php echo $row['photo']; ?>" width="50" height="50"><br><br>

    <label for="photo">Update Photo:</label><br>
    <input type="file" id="photo" name="photo"><br><br>

    <input type="submit" value="Update Employee">
</form>

</body>
</html>

<?php $conn->close(); ?>
