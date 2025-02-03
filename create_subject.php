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
$subject_name = $conn->real_escape_string($_POST['subject_name']);
$subject_credit = $conn->real_escape_string($_POST['subject_credit']);
$sql = "INSERT INTO subject (subject_name, subject_credit) VALUES
('$subject_name', '$subject_credit')";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('New subject created successfully');
window.location.href = 'manage_subject.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_subject.php';</script>";
}
$conn->close();
}
?>