<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentsystem";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$class_id = $conn->real_escape_string($_POST['class_id']);
$sql = "DELETE FROM class WHERE class_id='$class_id'";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Class deleted successfully');
window.location.href = 'manage_class.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_class.php';</script>";
}
$conn->close();
}
?>