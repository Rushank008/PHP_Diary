<?php
session_start();
require 'db.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    die();
}

if (isset($_GET['id'])) {
    $entryId = $_GET['id'];
    
    // Fetch the entry to edit
    $stmt = $conn->prepare("SELECT * FROM diary_entries WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $entryId, $_SESSION['user_id']);
    $stmt->execute();
    $entry = $stmt->get_result()->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update the entry in the database
    $stmt = $conn->prepare("UPDATE diary_entries SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $entryId);
    $stmt->execute();

    header('Location: /view_diary'); // Redirect after updating
    exit();
}

require 'views/edit_entry.view.php';
