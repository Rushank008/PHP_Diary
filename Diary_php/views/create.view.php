<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/home.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="views/create.css"> <!-- Link to form styles -->
    <title>Create Diary</title>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="/home" class="logo">My Diary</a>
            <ul class="nav-links">
                <li><a href="/home">Home</a></li>
                <li><a href="/create_diary">Create Diary</a></li>
                <li><a href="/view_diary">View Diary</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="content">
    <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
            <p class="error-message"><?= $error ?></p>
            <?php endforeach; ?>
            <?php endif; ?>


            <?php if (isset($_SESSION['flash'])): ?>
            <p class="error-message"><?= htmlspecialchars($_SESSION['flash']) ?></p>
            <?php unset($_SESSION['flash']); // Clear the flash message after displaying ?>
            <?php endif; ?>
        <h1>Create a New Diary Entry</h1>
        <form action="/create_diary" method="POST" class="diary-form">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>

            <button type="submit">Save Diary Entry</button>
        </form>
    </div>
</body>
</html>
