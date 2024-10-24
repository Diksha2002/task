<?php
$conn = new mysqli("localhost", "root", "", "employee_management");

if ($conn->connect_error) {
    # code...
    die("Connection failed:" . $conn->connect_error);

}
$sql = "select * from employees";
$result = $conn->query($sql);
echo "<h2> Employee List</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>First name</th>
    <th>Last name</th>
    <th>email</th>
    <th>Mobile</th>
    <th>Country Code</th>
    <th>Address</th>
    <th>Gender</th>
    <th>hobby</th>
    <th>Photo</th>

    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>".$row['id']."</td>
          <td>".$row['first_name']."</td>
          <td>".$row['last_name']."</td>
          <td>".$row['email']."</td>
          <td>".$row['mobile']."</td>
          <td>".$row['country_code']."</td>
          <td>".$row['address']."</td>
          <td>".$row['gender']."</td>
          <td>".$row['hobby']."</td>
          <td><img src='uploads/".$row['photo']."' alt='emp photo' width='100' height='100'</td>
          <td><a href='update_employee.php? id=".$row['id']."'>Edit</a> |
          <a href='delete_employee.php? id=".$row['id']."'>Delete</a></td>
        </tr>";
    }
    echo "</table>";
  
}else{
    echo "0 record found";
}
$conn->close();
?>