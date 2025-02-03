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
$student_id = $conn->real_escape_string($_POST['student_id']);
$sql = "DELETE FROM student WHERE student_id='$student_id'";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Student deleted successfully');
window.location.href = 'manage_student.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_student.php';</script>";
}
$conn->close();
}
?>