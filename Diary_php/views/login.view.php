<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/login.css"> <!-- Link to your CSS file -->
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Log In</h2>
        <form action="/login" method="POST" class="login-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Log In</button>

            <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
            <p class="error-message"><?= $error ?></p>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['flash'])): ?>
            <p class="error-message"><?= htmlspecialchars($_SESSION['flash']) ?></p>
            <?php unset($_SESSION['flash']); // Clear the flash message after displaying ?>
            <?php endif; ?>

        </form>
        <p class="info-text">Don't have an account? <a href="/">Sign up</a></p>
    </div>
</body>
</html>
