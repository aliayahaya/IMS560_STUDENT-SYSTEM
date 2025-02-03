<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $conn->real_escape_string($_POST['student_id']);
    $advisor_id = $conn->real_escape_string($_POST['advisor_id']);

    // Ensure student exists before updating
    $check_student = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result = $conn->query($check_student);

    if ($result->num_rows > 0) {
        // Check if student is already enrolled under the selected advisor
        $check_enrollment = "SELECT * FROM student WHERE student_id = '$student_id' AND advisor_id = '$advisor_id'";
        $enrollment_result = $conn->query($check_enrollment);

        if ($enrollment_result->num_rows > 0) {
            // Student is already un the advisor, prevent duplicate entry
            echo "<script>alert('This student is already enrolled under this advisor.');
            window.location.href = 'enroll_advisor.php';</script>";
        } else {
            // Update student's course_id only if they are not already in the class
            $sql = "UPDATE student SET advisor_id = '$advisor_id' WHERE student_id = '$student_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Student successfully enrolled under the advisor.');
            window.location.href = 'enroll_advisor.php';</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'enroll_advisor.php';</script>";
        }
    }
    } else {
        echo "<script>alert('Student ID not found. Please check again.');
        window.location.href = 'enroll_advisor.php';</script>";
    }
}

// Close Connection
$conn->close();
?>
