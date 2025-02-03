<?php
session_start(); // Start session

if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
$con = mysqli_connect("localhost", "root", "", "studentsystem") or die(mysqli_connect_errno($con));

// Fetch user data from the database
$username = $_SESSION['username'];
$query = mysqli_query($con, "SELECT * FROM register WHERE username='$username'") or die(mysqli_error($con));
$userData = mysqli_fetch_array($query);

if (!$userData) {
    die("User not found!"); // Handle the case when user doesn't exist
}

// Extract user_id from the fetched data
$user_id = $userData['user_id']; // Assuming 'user_id' exists in 'register' table
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Database Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to the Database Student System</h1>
        <a href="logout.php">
            <button class="logout-btn">Logout</button>
        </a>
    </header>
    <div class="menu-container">
        <div class="menu-item"
        onclick="window.location.href='manage_student.php'">Manage Students</div>
        <div class="menu-item"
        onclick="window.location.href='manage_subject.php'">Manage Subjects</div>
        <div class="menu-item"
        onclick="window.location.href='manage_lecturer.php'">Manage Lecturers</div>
        <div class="menu-item"
        onclick="window.location.href='manage_course.php'">Manage Courses</div>
        <div class="menu-item"
        onclick="window.location.href='manage_advisor.php'">Manage Advisors</div>
        <div class="menu-item"
        onclick="window.location.href='manage_class.php'">Manage Class</div>
        <div class="menu-item"
        onclick="window.location.href='enroll_student.php'">Enroll Student in Subject</div>
        <div class="menu-item"
        onclick="window.location.href='enroll_class.php'">Enroll Student in Class</div>
        <div class="menu-item"
        onclick="window.location.href='enroll_course.php'">Enroll Student in Course</div>
        <div class="menu-item"
        onclick="window.location.href='enroll_advisor.php'">Enroll Student Under Advisor</div>
        <div class="menu-item"
        onclick="window.location.href='enroll_lecturer.php'">Enroll Lecturer in Subject</div>
        <div class="menu-item"
        onclick="window.location.href='queries.php'">Queries</div>
    </div>
</body>
</html>