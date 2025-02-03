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
$lecturer_id = $conn->real_escape_string($_POST['lecturer_id']);
$sql = "DELETE FROM lecturer WHERE lecturer_id='$lecturer_id'";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Lecturer deleted successfully');
window.location.href = 'manage_lecturer.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_lecturer.php';</script>";
}
$conn->close();
}
?>