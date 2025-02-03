<?php

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "studentsystem") 
    or die("Connection failed: " . mysqli_connect_error());

// Get form data and sanitize input
$name = mysqli_real_escape_string($con, $_POST["name"]);
$phone = mysqli_real_escape_string($con, $_POST["phone"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);

// Prepare the SQL query
$sql = "INSERT INTO register (name, phone, email, username, password)
        VALUES ('$name', '$phone', '$email', '$username', '$password')";

// Execute the query and check for success
if (mysqli_query($con, $sql)) {
    echo "<script>
        alert('New user registered successfully');
        window.location.href = 'login.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . mysqli_error($con) . "');
        window.location.href = 'login.php';
    </script>";
}

// Close the database connection
mysqli_close($con);

?>

