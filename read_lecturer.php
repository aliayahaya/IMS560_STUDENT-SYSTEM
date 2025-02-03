<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Read Lecturer</title> 
    <link rel="stylesheet" href="styles.css"> 
</head> 
<body> 
    <div class="content"> 
        <h2>Lecturer List</h2> 
        <?php $conn = new mysqli("localhost", "root", "", "studentsystem"); 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
        $sql = "SELECT * FROM lecturer"; 
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            echo 
"<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Profile</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo
"<tr><td>".$row["lecturer_id"]."</td><td>".$row["lecturer_name"]."</td><td>"
.$row["lecturer_age"]."</td><td>".$row["lecturer_gender"]."</td><td><img src='".$row["lecturer_profile"]."' width='100'></td></tr>"; 
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