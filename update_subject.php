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
    $subject_name = $conn->real_escape_string($_POST['subject_name']); 
    $subject_credit = $conn->real_escape_string($_POST['subject_credit']); 

    $sql = "UPDATE subject SET subject_name='$subject_name', subject_credit='$subject_credit' 
    WHERE subject_id='$subject_id'"; 
    
    if ($conn->query($sql) === TRUE) { 
        echo "<script>alert('Subject updated successfully'); 
window.location.href = 'manage_subject.php';</script>"; 
    } else { 
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . 
"'); window.location.href = 'manage_subject.php';</script>"; 
    } 
            
    $conn->close(); 
} 
?>