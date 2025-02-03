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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lecturer_id = $conn->real_escape_string($_POST['lecturer_id']);

    
    $sql = "SELECT s.subject_id, s.subject_name
            FROM subject s
            JOIN lecturer_subject ss ON s.subject_id = ss.subject_id
            WHERE ss.lecturer_id = '$lecturer_id'";

    $result = $conn->query($sql);

    echo "<h2>Subject Taught by Lecturer ID: $lecturer_id</h2>";

    if ($result->num_rows > 0) {
        echo "<table border='1' cellspacing='0' cellpadding='8'>";
        echo "<tr><th>Subject ID</th><th>Subject Name</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['subject_id']}</td>
                    <td>{$row['subject_name']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No subject found for this lecturer.</p>";
    }
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