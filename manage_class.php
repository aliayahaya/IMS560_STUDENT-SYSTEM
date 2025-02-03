<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Class</title>
    <link rel="stylesheet" href="manage.css">
</head> 
<body>
    <div class="content">
        <h2>Manage Class</h2>
        <div class="tabs">
            <button class="tablink" onclick="window.location.href='index.php';">
            Home</button>
            <button class="tablink" onclick="openTab(event,
            'Create')">Create Class</button>
            <button class="tablink" onclick="openTab(event, 'Read')">Read
            Class</button>
            <button class="tablink" onclick="openTab(event,
            'Update')">Update Class</button>
            <button class="tablink" onclick="openTab(event,
            'Delete')">Delete Class</button>
    </div>

    <div id="Create" class="tabcontent">
        <h3>Create Class</h3>
        <form action="create_class.php" method="post">
            <label for="class_code">Class Code:</label>
            <input type="text" id="class_code" name="class_code"
            required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="Read" class="tabcontent">
        <h3>Read Class</h3>
        <?php
        $conn = new mysqli("localhost", "root", "",
        "studentsystem");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM class";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo
"<table><tr><th>ID</th><th>Code</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo
"<tr><td>".$row["class_id"]."</td><td>".$row["class_code"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>

        <div id="Update" class="tabcontent">
            <h3>Update Class</h3>
            <form action="update_class.php" method="post">
                <label for="class_id">ID:</label>
            <input type="text" id="class_id" name="class_id"
            required><br><br>

            <form action="update_class.php" method="post">
                <label for="class_code">Code:</label>
            <input type="text" id="class_code" name="class_code"
            required><br><br>

                <input type="submit" value="Update">
            </form>
        </div>
        <div id="Delete" class="tabcontent">
            <h3>Delete Class</h3>
            <form action="delete_class.php" method="post">
                <label for="class_id">Class ID:</label>
                <input type="number" id="class_id" name="class_id"
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