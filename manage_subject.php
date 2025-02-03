<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Subject</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body> 
    <div class="content">
        <h2>Manage Subject</h2>
        <div class="tabs">
            <button class="tablink" onclick="window.location.href='index.php';">
            Home</button>
            <button class="tablink" onclick="openTab(event,
            'Create')">Create Subject</button>
            <button class="tablink" onclick="openTab(event, 'Read')">Read
            Subject</button>
            <button class="tablink" onclick="openTab(event,
            'Update')">Update Subject</button>
            <button class="tablink" onclick="openTab(event,
            'Delete')">Delete Subject</button>
    </div>

    <div id="Create" class="tabcontent">
        <h3>Create Subject</h3>
        <form action="create_subject.php" method="post">
            <label for="subject_name">Name:</label>
            <input type="text" id="subject_name" name="subject_name"
            required><br><br>

            <label for="subject_credit">Credit:</label>
            <input type="number" id="subject_credit" name="subject_credit"
            required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="Read" class="tabcontent">
        <h3>Read Subject</h3>
        <?php
        $conn = new mysqli("localhost", "root", "",
        "studentsystem");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM subject";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo
"<table><tr><th>ID</th><th>Name</th><th>Credit</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo
"<tr><td>".$row["subject_id"]."</td><td>".$row["subject_name"]."</td><td>"
.$row["subject_credit"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>

        <div id="Update" class="tabcontent">
            <h3>Update Subject</h3>
            <form action="update_subject.php" method="post">
            <label for="subject_id">ID:</label>
            <input type="text" id="subject_id" name="subject_id"
            required><br><br>

            <form action="update_subject.php" method="post">
            <label for="subject_name">Name:</label>
            <input type="text" id="subject_name" name="subject_name"
            required><br><br>

            <label for="subject_credit">Credit:</label>
            <input type="number" id="subject_credit" name="subject_credit"
            required><br><br>

                <input type="submit" value="Update">
            </form>
        </div>
        <div id="Delete" class="tabcontent">
            <h3>Delete Subject</h3>
            <form action="delete_subject.php" method="post">
                <label for="subject_id">Subject ID:</label>
                <input type="number" id="subject_id" name="subject_id"
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