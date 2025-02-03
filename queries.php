<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Queries</title>
    <link rel="stylesheet" href="query.css">
</head>
<body>

<header>
    <span>Query System</span>
    <a href="index.php">
        <button class="home-btn">Home</button>
    </a>
</header>

<div class="content">
    <h2>Queries</h2>

    <!-- Query 1: Retrieve all students enrolled in a specific subject -->
    <div class="query-section">
        <h3>1. Retrieve all students enrolled in a specific subject</h3>
        <form action="query1.php" method="post">
            <label for="subject_id">Subject ID:</label>
            <input type="number" id="subject_id" name="subject_id" required>
            <br><br>
            <input type="submit" value="Execute">
        </form>
    </div>

    <!-- Query 2: Retrieve all students enrolled in a specific class -->
    <div class="query-section">
        <h3>2. Retrieve all students enrolled in a specific class</h3>
        <form action="query4.php" method="post">
            <label for="class_id">Class ID:</label>
            <input type="number" id="class_id" name="class_id" required>
            <br><br>
            <input type="submit" value="Execute">
        </form>
    </div>

    <!-- Query 3: Retrieve all students enrolled in a specific course -->
    <div class="query-section">
        <h3>3. Retrieve all students enrolled in a specific course</h3>
        <form action="query2.php" method="post">
            <label for="course_id">Course ID:</label>
            <input type="number" id="course_id" name="course_id" required>
            <br><br>
            <input type="submit" value="Execute">
        </form>
    </div>

    <!-- Query 4: Retrieve all subjects assigned to a specific lecturer -->
    <div class="query-section">
        <h3>4. Retrieve all subjects assigned to a specific lecturer</h3>
        <form action="query3.php" method="post">
            <label for="lecturer_id">Lecturer ID:</label>
            <input type="number" id="lecturer_id" name="lecturer_id" required>
            <br><br>
            <input type="submit" value="Execute">
        </form>
    </div>

     <!-- Query 5: List all students under a specific advisor -->
     <div class="query-section">
        <h3>5. List all students under a specific advisor</h3>
        <form action="query5.php" method="post">
            <label for="advisor_id">Advisor ID:</label>
            <input type="number" id="advisor_id" name="advisor_id" required>
            <br><br>
            <input type="submit" value="Execute">
        </form>
    </div>

</div>

</body>
</html>