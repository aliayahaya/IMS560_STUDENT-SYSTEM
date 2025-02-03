<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Lecturer</title>
    <link rel="stylesheet" href="manage.css">
</head> 
<body>
    <div class="content">
        <h2>Manage Lecturer</h2>
        <div class="tabs">
            <button class="tablink" onclick="window.location.href='index.php';">
            Home</button>
            <button class="tablink" onclick="openTab(event,
            'Create')">Create Lecturer</button>
            <button class="tablink" onclick="openTab(event, 'Read')">Read
            Lecturer</button>
            <button class="tablink" onclick="openTab(event,
            'Update')">Update Lecturer</button>
            <button class="tablink" onclick="openTab(event,
            'Delete')">Delete Lecturer</button>
    </div>

    <div id="Create" class="tabcontent">
        <h3>Create Lecturer</h3>
        <form action="create_lecturer.php" method="post" enctype="multipart/form-data">
            <label for="lecturer_name">Name:</label>
            <input type="text" id="lecturer_name" name="lecturer_name"
            required><br><br>

            <label for="lecturer_age">Age:</label>
            <input type="number" id="lecturer_age" name="lecturer_age"
            required><br><br>

            <label for="lecturer_gender">Gender:</label>
            <input type="text" id="lecturer_gender" name="lecturer_gender"
            required><br><br>

            <label for="lecturer_profile">Profile:</label>
            <input type="file" id="lecturer_profile" name="lecturer_profile"
            required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="Read" class="tabcontent">
        <h3>Read Lecturer</h3>
        <?php
        $conn = new mysqli("localhost", "root", "",
        "studentsystem");
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

        <div id="Update" class="tabcontent">
            <h3>Update Lecturer</h3>
            <form action="update_lecturer.php" method="post">
                <label for="lecturer_id">ID:</label>
            <input type="text" id="lecturer_id" name="lecturer_id"
            required><br><br>

            <form action="update_lecturer.php" method="post">
                <label for="lecturer_name">Name:</label>
            <input type="text" id="lecturer_name" name="lecturer_name"
            required><br><br>

            <label for="lecturer_age">Age:</label>
            <input type="number" id="lecturer_age" name="lecturer_age"
            required><br><br>
            
            <label for="lecturer_gender">Gender:</label>
            <input type="text" id="lecturer_gender" name="lecturer_gender"
            required><br><br>

            <label for="lecturer_profile">Profile:</label>
            <input type="file" id="lecturer_profile" name="lecturer_profile"
            required><br><br>

                <input type="submit" value="Update">
            </form>
        </div>
        <div id="Delete" class="tabcontent">
            <h3>Delete Lecturer</h3>
            <form action="delete_lecturer.php" method="post">
                <label for="lecturer_id">Lecturer ID:</label>
                <input type="number" id="lecturer_id" name="lecturer_id"
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