<?php
$conn = new mysqli("localhost", "root", "", "employee_management");

if ($conn->connect_error) {
    # code...
    die("Connection failed:" . $conn->connect_error);

}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
$id = $_GET['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$country_code = $_POST['country_code'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$hobby = implode(",", $_POST['hobby']);

$first_name = $_POST['first_name'];
$first_name = $_POST['first_name'];
  if ($_FILES['photo']['name']) {
    $photo = $_FILES['photo']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    $sql = "Update employees SET first_name = '$first_name', last_name='$last_name', email='$email', mobile='$mobile', country_code='$country_code',address='$address',gender='$gender', hobby='$hobby',photo='$photo' where id=$id";
  }else{
    $sql = "Update employees SET first_name = '$first_name', last_name='$last_name', email='$email', mobile='$mobile', country_code='$country_code',address='$address',gender='$gender', hobby='$hobby' where id=$id";
  }
  if ($conn->query($sql) === TRUE) {
    echo "employee updated successfully!";
    header("location: employee_list.php");
    } else {
        echo "Error updating employee: " . $conn->error;
    }
}
$conn->close();
?>

