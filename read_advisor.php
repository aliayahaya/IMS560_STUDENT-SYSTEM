<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Read Advisor</title> 
    <link rel="stylesheet" href="styles.css"> 
</head> 
<body> 
    <div class="content"> 
        <h2>Advisor List</h2> 
        <?php $conn = new mysqli("localhost", "root", "", "studentsystem"); 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
        $sql = "SELECT * FROM advisor"; 
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            echo 
"<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Profile</th></tr>"; 
        while($row = $result->fetch_assoc()) { 
            echo 
"<tr><td>".$row["advisor_id"]."</td><td>".$row["advisor_name"]."</td><td>"
.$row["advisor_age"]."</td><td>".$row["advisor_gender"]."</td><td><img src='".$row["advisor_profile"]." 'width='100'></td></tr>"; 
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