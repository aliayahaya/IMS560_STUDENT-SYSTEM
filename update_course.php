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
    $course_id = $conn->real_escape_string($_POST['course_id']); 
    $course_name = $conn->real_escape_string($_POST['course_name']); 

    $sql = "UPDATE course SET course_name='$course_name' WHERE course_id='$course_id'"; 
    
    if ($conn->query($sql) === TRUE) { 
        echo "<script>alert('Course updated successfully'); 
window.location.href = 'manage_course.php';</script>"; 
    } else { 
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . 
"'); window.location.href = 'manage_course.php';</script>"; 
    } 
            
    $conn->close(); 
} 
?>