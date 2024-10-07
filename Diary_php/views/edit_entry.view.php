<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/home.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="views/edit.css">
    <title>Edit</title>
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
    <!-- Edit Diary Form -->
<!-- Enhanced Edit Diary Form -->
<form action="" method="POST" class="edit-diary-form">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" class="form-input" value="<?= htmlspecialchars($entry['title']) ?>" required>
    </div>

    <div class="form-group">
        <label for="content">Content:</label>
        <textarea id="content" name="content" class="form-textarea" required><?= htmlspecialchars($entry['content']) ?></textarea>
    </div>

    <button type="submit" class="btn-submit">Update Diary Entry</button>
</form>

</form>
</body>
</html>