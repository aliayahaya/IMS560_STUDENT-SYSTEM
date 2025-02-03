<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Read Student</title> 
    <link rel="stylesheet" href="styles.css"> 
</head> 
<body> 
    <div class="content"> 
        <h2>Student List</h2> 
        <?php $conn = new mysqli("localhost", "root", "", "studentsystem"); 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
        $sql = "SELECT * FROM student"; 
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            echo 
"<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Profile</th></tr>"; 
        while($row = $result->fetch_assoc()) { 
            echo 
"<tr><td>".$row["student_id"]."</td><td>".$row["student_name"]."</td><td>"
.$row["student_age"]."</td><td>".$row["student_gender"]."</td><td><img src='".$row["student_profile"]."' width='100'></td></tr>"; 
            } 
            echo "</table>"; 
        } else { 
            echo "0 results"; 
        } 
        $conn->close(); 
        ?> 
    </div> 
</body> 
</html>