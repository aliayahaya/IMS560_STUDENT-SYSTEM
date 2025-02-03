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
    $advisor_name = $conn->real_escape_string($_POST['advisor_name']); 
    $advisor_age = $conn->real_escape_string($_POST['advisor_age']); 
    $advisor_gender = $conn->real_escape_string($_POST['advisor_gender']);

    if (!empty($_FILES["advisor_profile"]["name"])) {
        $target_dir = "uploads/advisors/";
        $target_file = $target_dir . basename($_FILES["advisor_profile"]["name"]);
        move_uploaded_file($_FILES["advisor_profile"]["tmp_name"], $target_file);
        $sql = "UPDATE advisor SET advisor_name='$advisor_name', advisor_age='$advisor_age', advisor_gender='$advisor_gender', advisor_profile='$target_file' WHERE advisor_id='$advisor_id'";
    } else {
    $sql = "UPDATE advisor SET advisor_name='$advisor_name', advisor_age='$advisor_age', 
    advisor_gender='$advisor_gender' WHERE advisor_id='$advisor_id'"; 
    }

    if ($conn->query($sql) === TRUE) { 
        echo "<script>alert('Advisor updated successfully'); 
window.location.href = 'manage_advisor.php';</script>"; 
    } else { 
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . 
"'); window.location.href = 'manage_advisor.php';</script>"; 
    } 
            
    $conn->close(); 
} 
?>