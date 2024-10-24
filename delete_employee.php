<?php
$conn = new mysqli("localhost", "root", "", "employee_management");

if ($conn->connect_error) {
    # code...
    die("Connection failed:" . $conn->connect_error);

}
if (isset($_GET['id'])) {
$id = $_GET['id'];

$sql ="Delete from employees WHERE id=$id";
if ($conn->query($sql)=== TRUE) {
    echo "employee deleted successfully!";
    header("location: employee_list.php");
    } else {
        echo "Error deleting employee: " . $conn->error;
    }
   
}
$conn->close();
?>