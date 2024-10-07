<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/home.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="views/view.css"> <!-- Link to diary entries styles -->
    <title>View Diary Entries</title>
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
        <h1>Your Diary Entries</h1>

        <form action="" method="GET" class="search-form">
    <input type="text" name="search" class="search-input" placeholder="Search entries..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <button type="submit" class="search-button">Search</button>
</form>
 
        <div class="entries-container">

<?php if (!empty($entries)): ?>
    <?php foreach ($entries as $entry): ?>
        <div class="entry">
            <h2><?= htmlspecialchars($entry['title']) ?></h2>
            <p class="entry-content"><?= htmlspecialchars($entry['content']) ?></p>
            <p class="entry-date"><?= htmlspecialchars($entry['created_at']) ?></p>
            <a href="/edit_diary?id=<?= $entry['id'] ?>" class="edit-icon">✏️</a>
            <a href="/delete_diary?id=<?= $entry['id'] ?>" class="delete-icon" onclick="return confirm('Are you sure you want to delete this entry?');">🗑️</a>

        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No diary entries found.</p>
<?php endif; ?>


        </div>
    </div>
</body>
</html>
