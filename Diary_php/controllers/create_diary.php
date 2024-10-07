<?php
require 'db.php';
session_start();

$errors = [];

if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash'] = 'You must log in to access that page.';
    header('Location: /login');  // Redirect to login if not logged in
    die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));
    
    if(empty($title) || empty($content)){
        $errors[]= "Title or content cannot be empty.";
    }
    if(strlen($title)>100){
        $errors[] = "Title cannot be greater than 100 characters.";
    }
    if(strlen($content)> 300){
       $errors[] = "Content cannot be greater than 300 characters.";
    }
    if(empty($errors)){
        $stmt = $conn->prepare("INSERT INTO diary_entries (title,content,user_id) VALUES (?,?,?)") ;
        $stmt->bind_param("sss",$title,$content,$_SESSION['user_id']);
        $stmt->execute();
        $stmt->close();
        $_SESSION['flash'] = 'Diary entry created successfully.';
    }

 }
require 'views/create.view.php';