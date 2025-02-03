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
$advisor_id = $conn->real_escape_string($_POST['advisor_id']);
$sql = "DELETE FROM advisor WHERE advisor_id='$advisor_id'";
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Advisor deleted successfully');
window.location.href = 'manage_advisor.php';</script>";
} else {
echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .
"'); window.location.href = 'manage_advisor.php';</script>";
}
$conn->close();
}
?>