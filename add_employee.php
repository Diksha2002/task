<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>

<h2>Add a New Employee</h2>

<form action="insert_employee.php" method="POST" enctype="multipart/form-data">
    <label for="first_name">First Name:</label><br>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label><br>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="country_code">Country Code:</label><br>
    <select id="country_code" name="country_code">
        <option value="+1">+1 (USA)</option>
        <option value="+44">+44 (UK)</option>
        <option value="+91">+91 (India)</option>
    </select><br><br>

    <label for="mobile">Mobile:</label><br>
    <input type="number" id="mobile" name="mobile" required><br><br>

    <label for="address">Address:</label><br>
    <textarea id="address" name="address" required></textarea><br><br>

    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="Male" required>
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="Female" required>
    <label for="female">Female</label><br><br>

    <label>hobby:</label><br>
    <input type="checkbox" id="reading" name="hobby[]" value="Reading">
    <label for="reading">Reading</label><br>
    <input type="checkbox" id="sports" name="hobby[]" value="Sports">
    <label for="sports">Sports</label><br>
    <input type="checkbox" id="music" name="hobby[]" value="Music">
    <label for="music">Music</label><br><br>

    <label for="photo">Photo:</label><br>
    <input type="file" id="photo" name="photo" required><br><br>

    <input type="submit" value="Add Employee">
</form>

</body>
</html>
