<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Student</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body>
    <div class="content">
        <h2>Manage Student</h2>
        <div class="tabs">
            <button class="tablink" onclick="window.location.href='index.php';">
            Home</button>
            <button class="tablink" onclick="openTab(event,
            'Create')">Create Student</button>
            <button class="tablink" onclick="openTab(event, 'Read')">Read
            Student</button>
            <button class="tablink" onclick="openTab(event,
            'Update')">Update Student</button>
            <button class="tablink" onclick="openTab(event,
            'Delete')">Delete Student</button>
    </div>

    <div id="Create" class="tabcontent">
        <h3>Create Student</h3>
        <form action="create_student.php" method="post" enctype="multipart/form-data">
            <label for="student_name">Name:</label>
            <input type="text" id="student_name" name="student_name"
            required><br><br>

            <label for="student_age">Age:</label>
            <input type="number" id="student_age" name="student_age"
            required><br><br>

            <label for="student_gender">Gender:</label>
            <input type="text" id="student_gender" name="student_gender"
            required><br><br>
            
            <label for="student_profile">Profile Picture:</label>
            <input type="file" id="student_profile" name="student_profile" required><br><br>

            <input type="submit" value="Submit">
        </form>

    </div>


    <div id="Read" class="tabcontent">
        <h3>Read Student</h3>
        <?php
        $conn = new mysqli("localhost", "root", "",
        "studentsystem");
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

        <div id="Update" class="tabcontent">
            <h3>Update Student</h3>
            <form action="update_student.php" method="post" enctype="multipart/form-data">
                <label for="student_id">ID:</label>
            <input type="text" id="student_id" name="student_id"
            required><br><br>

            <form action="update_student.php" method="post">
                <label for="student_name">Name:</label>
            <input type="text" id="student_name" name="student_name"
            required><br><br>

            <label for="student_age">Age:</label>
            <input type="number" id="student_age" name="student_age"
            required><br><br>

            <label for="student_gender">Gender:</label>
            <input type="text" id="student_gender" name="student_gender"
            required><br><br>

            <label for="student_profile">Profile Picture:</label>
            <input type="file" id="student_profile" name="student_profile" required><br><br>

                <input type="submit" value="Update">
            </form>

            
        </div>
        <div id="Delete" class="tabcontent">
            <h3>Delete Student</h3>
            <form action="delete_student.php" method="post">
                <label for="student_id">Student ID:</label>
                <input type="number" id="student_id" name="student_id"
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