<?php
session_start(); // Start the session

$con = mysqli_connect ("localhost", "root", "", "studentsystem") or die
(mysqli_connect_errno($con));


if (isset($_POST["username"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Query to check the username and password
    $semak = mysqli_query($con, "SELECT * FROM register WHERE username='$username' AND password='$password'") or die(mysqli_error($con));

    $bilrekod = mysqli_num_rows($semak);

    if ($bilrekod == 0) {
        echo "Wrong username or password";
    } else {
        $datarekod = mysqli_fetch_assoc($semak); // Fetch user details
        $_SESSION["username"] = $username;

        // Redirect all successful logins to index.php
        header("Location: index.php");
        exit();
    }
}
?>