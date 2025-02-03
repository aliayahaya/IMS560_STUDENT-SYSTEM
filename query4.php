<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['class_id'])) {
    $class_id = $conn->real_escape_string($_POST['class_id']);

    // SQL Query: Select students enrolled in the given class
    $sql = "SELECT student_id, student_name FROM student WHERE class_id = '$class_id'";

    $result = $conn->query($sql);

    echo "<h2>Students Enrolled in Class ID: $class_id</h2>";

    if ($result->num_rows > 0) {
        echo "<table border='1' cellspacing='0' cellpadding='8'>";
        echo "<tr><th>Student ID</th><th>Student Name</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['student_id']}</td>
                    <td>{$row['student_name']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No students found for this class.</p>";
    }
} else {
    echo "<p style='color:red;'>Error: Class ID is missing.</p>";
}

// Close Connection
$conn->close();
?>

<br>
<a href="queries.php">
    <button style="padding: 10px 20px; font-size: 16px; background-color: #007aff; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Back
    </button>
</a>
