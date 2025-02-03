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
$advisor_name = $conn->real_escape_string($_POST['advisor_name']);
$advisor_age = $conn->real_escape_string($_POST['advisor_age']);
$advisor_gender = $conn->real_escape_string($_POST['advisor_gender']);

// Handle file upload
$target_dir = "uploads/advisors/";
$target_file = $target_dir . basename($_FILES["advisor_profile"]["name"]);
move_uploaded_file($_FILES["advisor_profile"]["tmp_name"], $target_file);

$sql = "INSERT INTO advisor (advisor_name, advisor_age, advisor_gender, advisor_profile) VALUES
('$advisor_name', '$advisor_age', '$advisor_gender', '$target_file')";

if ($conn->query($sql) === TRUE) {
echo "<script>alert('New advisor created successfully');
window.location.href = 'manage_advisor.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_advisor.php';</script>";
}
$conn->close();
}
?>