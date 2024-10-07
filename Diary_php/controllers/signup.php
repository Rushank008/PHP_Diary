<?php
session_start();

require 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $errors = [];

    if(empty($username)){
        $errors [] = 'Username must not be empty';
    }
    if(strlen($password) < 5){
        $errors [] = 'Password must be at least 5 characters';
    }
    
    $stmt = $conn->prepare('Select * from users where username = ?');
    $stmt->bind_param("s",$username); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        $errors[] = 'Username already exists';
    }

    //If there are no errors
    if(empty($errors)){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //prepare and execute sql query
        $stmt = $conn->prepare("INSERT INTO users (username,password) values (?,?)");
        $stmt->bind_param("ss",$username,$hashed_password);
        if($stmt->execute()){
            $_SESSION['flash'] = "User successfully registered";
        }
        else{
            echo "Error" . $stmt->error;
        } 

        $stmt->close();
    }
}
require 'views/signup.view.php';