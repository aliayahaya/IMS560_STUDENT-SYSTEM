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
$lecturer_name = $conn->real_escape_string($_POST['lecturer_name']);
$lecturer_age = $conn->real_escape_string($_POST['lecturer_age']);
$lecturer_gender = $conn->real_escape_string($_POST['lecturer_gender']);

// Handle file upload
$target_dir = "uploads/lecturers/";
$target_file = $target_dir . basename($_FILES["lecturer_profile"]["name"]);
move_uploaded_file($_FILES["lecturer_profile"]["tmp_name"], $target_file);

$sql = "INSERT INTO lecturer (lecturer_name, lecturer_age, lecturer_gender, lecturer_profile) VALUES
('$lecturer_name', '$lecturer_age', '$lecturer_gender', '$target_file')";

if ($conn->query($sql) === TRUE) {
echo "<script>alert('New lecturer created successfully');
window.location.href = 'manage_lecturer.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_lecturer.php';</script>";
}
$conn->close();
}
?>