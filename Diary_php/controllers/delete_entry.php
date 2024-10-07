<?php
session_start();
require 'db.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    die();
}

if (isset($_GET['id'])) {
        $entryId = $_GET['id'];

        // Delete the entry from the database
        $stmt = $conn->prepare("DELETE FROM diary_entries WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $entryId, $_SESSION['user_id']);
        $stmt->execute();
    
        header('Location: /view_diary'); // Redirect after deletion
        exit();
    }
    

