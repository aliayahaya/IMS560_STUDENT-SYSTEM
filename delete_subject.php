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
$subject_id = $conn->real_escape_string($_POST['subject_id']);
$sql = "DELETE FROM subject WHERE subject_id='$subject_id'";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Subject deleted successfully');
window.location.href = 'manage_subject.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_students.php';</script>";
}
$conn->close();
}
?>