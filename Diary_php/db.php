<?php 
    $host = 'localhost';
    $db = 'diary_php';         // Database name
    $user = 'root';            // MySQL user (use the correct user, in this case 'root')
    $password = 'Your_pass';  // MySQL password for root user

    // Corrected the order of parameters in the mysqli constructor
    $conn = new mysqli($host, $user, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

