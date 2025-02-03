<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="form-container">
    <h2>Login</h2>
    <form action="process.php" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</div>
<script>
  document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevents the form from submitting the traditional way

    // Add your login/register logic here

    // After success, clear the form
    document.getElementById('loginForm').reset();  // This clears all the fields in the form
  });
</script>

</body>
</html>

