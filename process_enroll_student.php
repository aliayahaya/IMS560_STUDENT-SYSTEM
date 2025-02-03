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
    $student_id = $conn->real_escape_string($_POST['student_id']);
    $subject_id = $conn->real_escape_string($_POST['subject_id']);
    
    // Check if the lecturer is already enrolled in the subject
    $check_sql = "SELECT * FROM student_subject WHERE student_id = '$student_id' AND subject_id = '$subject_id'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('The student is already enrolled in this subject.'); window.location.href = 'enroll_student.php';</script>";
    } else {
        $sql = "INSERT INTO student_subject (student_id, subject_id) VALUES('$student_id', '$subject_id')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('student enrolled successfully');
            window.location.href = 'enroll_student.php';</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location.href = 'enroll_student.php';</script>";
        }
    }
    $conn->close();
}
?>
