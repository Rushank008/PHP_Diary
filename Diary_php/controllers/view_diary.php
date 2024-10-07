<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash'] = 'You must log in to access that page.';
    header('Location: /login');  // Redirect to login if not logged in
    die();
}

$user_id = $_SESSION['user_id'];

$search = isset($_GET['search']) ? $_GET['search'] : ''; // Get search input

// Modify the SQL query to include a search filter if there's any search input
$stmt = $conn->prepare(
    "SELECT * FROM diary_entries WHERE user_id = ? " . 
    ($search ? "AND (title LIKE ? OR content LIKE ?)" : "") .     //If search variable is not empty add the like query
    " ORDER BY created_at DESC"
);

if ($search) {
    $searchParam = "%" . $search . "%"; // Prepare search parameter with wildcards
    $stmt->bind_param("iss", $user_id, $searchParam, $searchParam); // Bind user_id and search terms
} else {
    $stmt->bind_param("i", $user_id); // Bind only user_id when there's no search
}

$stmt->execute();
$result = $stmt->get_result();
$entries = $result->fetch_all(MYSQLI_ASSOC); /* This is array of associative arrays Example :- 

[
    ['id' => 1, 'title' => 'First Entry'],
    ['id' => 2, 'title' => 'Second Entry']
]
*/

require 'views/view_diary.view.php';