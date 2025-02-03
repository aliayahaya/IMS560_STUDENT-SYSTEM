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
$class_code = $conn->real_escape_string($_POST['class_code']);
$sql = "INSERT INTO class (class_code) VALUES
('$class_code')";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('New class created successfully');
window.location.href = 'manage_class.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_class.php';</script>";
}
$conn->close();
}
?>