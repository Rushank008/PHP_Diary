<?php

require 'db.php';

session_start();

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));;
      
     // Validation logic
    if (empty($username)) {
        $errors[] = 'Username cannot be empty';
    }
    if (empty($password)) {
        $errors[] = 'Password cannot be empty';
    }
    
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT * from users where username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if(password_verify($password,$user["password"])){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /home');

                //header("Location: ");
            }
            else{
                $errors [] = "please check Your password";
            }
        }
        else{
            $errors[] = "No user exists with this particular Username";
        }
    }
}
require 'views/login.view.php';