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
    $course_id = $conn->real_escape_string($_POST['course_id']);

    // Ensure student exists before updating
    $check_student = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result = $conn->query($check_student);

    if ($result->num_rows > 0) {
        // Check if student is already enrolled in the selected class
        $check_enrollment = "SELECT * FROM student WHERE student_id = '$student_id' AND class_id = '$class_id'";
        $enrollment_result = $conn->query($check_enrollment);

        if ($enrollment_result->num_rows > 0) {
            // Student is already in the course, prevent duplicate entry
            echo "<script>alert('This student is already enrolled in this course.');
            window.location.href = 'enroll_course.php';</script>";
        } else {
            // Update student's course_id only if they are not already in the class
            $sql = "UPDATE student SET course_id = '$course_id' WHERE student_id = '$student_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Student successfully enrolled in the course.');
            window.location.href = 'enroll_course.php';</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'enroll_course.php';</script>";
        }
    }
    } else {
        echo "<script>alert('Student ID not found. Please check again.');
        window.location.href = 'enroll_course.php';</script>";
    }
}

// Close Connection
$conn->close();
?>
