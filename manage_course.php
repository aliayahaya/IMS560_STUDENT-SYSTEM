<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Course</title>
    <link rel="stylesheet" href="manage.css">
</head> 
<body>
    <div class="content">
        <h2>Manage Course</h2>
        <div class="tabs">
            <button class="tablink" onclick="window.location.href='index.php';">
            Home</button>
            <button class="tablink" onclick="openTab(event,
            'Create')">Create Course</button>
            <button class="tablink" onclick="openTab(event, 'Read')">Read
            Course</button>
            <button class="tablink" onclick="openTab(event,
            'Update')">Update Course</button>
            <button class="tablink" onclick="openTab(event,
            'Delete')">Delete Course</button>
    </div>

    <div id="Create" class="tabcontent">
        <h3>Create Course</h3>
        <form action="create_course.php" method="post">
            <label for="course_name">Name:</label>
            <input type="text" id="course_name" name="course_name"
            required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="Read" class="tabcontent">
        <h3>Read Course</h3>
        <?php
        $conn = new mysqli("localhost", "root", "",
        "studentsystem");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo
"<table><tr><th>ID</th><th>Name</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo
"<tr><td>".$row["course_id"]."</td><td>".$row["course_name"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>

        <div id="Update" class="tabcontent">
            <h3>Update Course</h3>
            <form action="update_course.php" method="post">
                <label for="course_id">ID:</label>
            <input type="text" id="course_id" name="course_id"
            required><br><br>

            <form action="update_course.php" method="post">
                <label for="course_name">Name:</label>
            <input type="text" id="course_name" name="course_name"
            required><br><br>

                <input type="submit" value="Update">
            </form>
        </div>
        <div id="Delete" class="tabcontent">
            <h3>Delete Course</h3>
            <form action="delete_course.php" method="post">
                <label for="course_id">Course ID:</label>
                <input type="number" id="course_id" name="course_id"
                required><br><br>
                <input type="submit" value="Delete">
            </form>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace("active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>