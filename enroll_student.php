<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enroll Student in Subject</title>
    <link rel="stylesheet" href="enroll.css">
    <style>
        .home-btn {
            display: block;
            width: 150px;
            margin: 1px auto;
            padding: 10px;
            text-align: center;
            background-color: #007aff;
            color: white;
            font-size: 13px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .home-btn:hover {
            background-color: #007aff;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Enroll Student in Subject</h2>
        <form action="process_enroll_student.php" method="post">
        <label for="student_id">Student ID:</label>
        <select id="student_id" name="student_id" required>
        <option value="">Select Student</option>

<?php
$conn = new mysqli("localhost", "root", "",
"studentsystem");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT student_id, student_name FROM student";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value='" . $row['student_id'] . "'>"
. $row['student_id'] . " - " . $row['student_name'] . "</option>";
}
}
$conn->close();
?>
        </select><br><br>
        <label for="subject_id">Subject ID:</label>
            <select id="subject_id" name="subject_id" required>
        <option value="">Select Subject</option>
<?php
$conn = new mysqli("localhost", "root", "",
"studentsystem");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT subject_id, subject_name FROM subject"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['subject_id'] . "'>"
    . $row['subject_id'] . " - " . $row['subject_name'] . "</option>";
    }
    }
    $conn->close();
?>
        </select><br><br>
        <input type="submit" value="Enroll">
        </form>
    </div>

    <a href="index.php">
        <button class="home-btn">Home</button>
        </a>
</body>
</html>