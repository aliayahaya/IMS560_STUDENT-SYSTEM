<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Advisor</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body> 
    <div class="content">
        <h2>Manage Advisor</h2>
        <div class="tabs">
            <button class="tablink" onclick="window.location.href='index.php';">
            Home</button>
            <button class="tablink" onclick="openTab(event,
            'Create')">Create Advisor</button>
            <button class="tablink" onclick="openTab(event, 'Read')">Read
            Advisor</button>
            <button class="tablink" onclick="openTab(event,
            'Update')">Update Advisor</button>
            <button class="tablink" onclick="openTab(event,
            'Delete')">Delete Advisor</button>
    </div>

    <div id="Create" class="tabcontent">
        <h3>Create Advisor</h3>
        <form action="create_advisor.php" method="post" enctype="multipart/form-data">
            <label for="advisor_name">Name:</label>
            <input type="text" id="advisor_name" name="advisor_name"
            required><br><br>

            <label for="advisor_age">Age:</label>
            <input type="number" id="advisor_age" name="advisor_age"
            required><br><br>

            <label for="advisor_gender">Gender:</label>
            <input type="text" id="advisor_gender" name="advisor_gender"
            required><br><br>

            <label for="advisor_profile">Profile:</label>
            <input type="file" id="advisor_profile" name="advisor_profile"
            required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="Read" class="tabcontent">
        <h3>Read Advisor</h3>
        <?php
        $conn = new mysqli("localhost", "root", "",
        "studentsystem");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM advisor";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo
"<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Profile</th></tr>"; 
        while($row = $result->fetch_assoc()) { 
            echo 
"<tr><td>".$row["advisor_id"]."</td><td>".$row["advisor_name"]."</td><td>"
.$row["advisor_age"]."</td><td>".$row["advisor_gender"]."</td><td><img src='".$row["advisor_profile"]." 'width='100'></td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>

        <div id="Update" class="tabcontent">
            <h3>Update Advisor</h3>
            <form action="update_advisor.php" method="post" enctype="multipart/form-data">
                <label for="advisor_id">ID:</label>
            <input type="text" id="advisor_id" name="advisor_id"
            required><br><br>

            <form action="update_advisor.php" method="post" enctype="multipart/form-data">
                <label for="advisor_name">Name:</label>
            <input type="text" id="advisor_name" name="advisor_name"
            required><br><br>

            <label for="advisor_age">Age:</label>
            <input type="number" id="advisor_age" name="advisor_age"
            required><br><br>
            
            <label for="advisor_gender">Gender:</label>
            <input type="text" id="advisor_gender" name="advisor_gender"
            required><br><br>

            <label for="advisor_profile">Profile:</label>
            <input type="file" id="advisor_profile" name="advisor_profile"
            required><br><br>

                <input type="submit" value="Update">
            </form>
        </div>
        <div id="Delete" class="tabcontent">
            <h3>Delete Advisor</h3>
            <form action="delete_advisor.php" method="post">
                <label for="advisor_id">Advisor ID:</label>
                <input type="number" id="advisor_id" name="advisor_id"
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