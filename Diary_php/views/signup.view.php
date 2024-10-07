<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/signup.css"> <!-- Link to your CSS file -->
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
    <?php if (isset($_SESSION['flash'])): ?>
            <p class="error-message"><?= htmlspecialchars($_SESSION['flash']) ?></p>
            <?php unset($_SESSION['flash']); // Clear the flash message after displaying ?>
            <?php endif; ?>
        <h2>Create an Account</h2>
        <form action="/" method="POST" class="signup-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Sign Up</button>

            <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
            <p class="error-message"><?= $error ?></p>
            <?php endforeach; ?>
            <?php endif; ?>
        </form>
        <p class="info-text">Already have an account? <a href="/login">Log in</a></p>
    </div>
</body>
</html>
