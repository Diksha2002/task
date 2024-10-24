<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "employee_management");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $country_code = $_POST['country_code'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $hobby = implode(",", $_POST['hobby']);
    $photo = $_FILES['photo']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    $sql = "INSERT INTO employees (first_name, last_name, email, mobile, country_code, address, gender, hobby, photo) 
            VALUES ('$first_name', '$last_name', '$email', '$mobile', '$country_code', '$address', '$gender', '$hobby', '$photo')";

    if ($conn->query($sql) === TRUE) {
        echo "New employee added successfully!";
        header("location: employee_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
