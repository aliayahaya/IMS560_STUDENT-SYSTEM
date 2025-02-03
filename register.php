<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<div class="form-container">
    <h2>User Registration</h2>
    <form action="register_user.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>  
        <button type="submit">Register</button>
    </form>
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

