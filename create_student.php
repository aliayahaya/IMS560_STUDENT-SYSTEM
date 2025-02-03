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
$student_name = $conn->real_escape_string($_POST['student_name']);
$student_age = $conn->real_escape_string($_POST['student_age']);
$student_gender = $conn->real_escape_string($_POST['student_gender']);

// Handle file upload
$target_dir = "uploads/students/";
$target_file = $target_dir . basename($_FILES["student_profile"]["name"]);
move_uploaded_file($_FILES["student_profile"]["tmp_name"], $target_file);

$sql = "INSERT INTO student (student_name, student_age, student_gender, student_profile) VALUES
('$student_name', '$student_age', '$student_gender', '$target_file')";

if ($conn->query($sql) === TRUE) {
echo "<script>alert('New student created successfully');
window.location.href = 'manage_student.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_student.php';</script>";
}
$conn->close();
}
?>