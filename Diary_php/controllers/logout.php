<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['flash'] = "You have successfully logged out."; // Set flash message
header('Location: /login');  // Redirect to login page after logout
die(); 
