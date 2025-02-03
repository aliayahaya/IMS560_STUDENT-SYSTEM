<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Read Subject</title> 
    <link rel="stylesheet" href="styles.css"> 
</head> 
<body> 
    <div class="content"> 
        <h2>Subject List</h2> 
        <?php $conn = new mysqli("localhost", "root", "", "studentsystem"); 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
        $sql = "SELECT * FROM subject"; 
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            echo 
"<table><tr><th>ID</th><th>Name</th><th>credit</th></tr>"; 
        while($row = $result->fetch_assoc()) { 
            echo 
"<tr><td>".$row["subjec_id"]."</td><td>".$row["subjec_name"]."</td><td>".$row["subjec_credit"]."</td></tr>"; 
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