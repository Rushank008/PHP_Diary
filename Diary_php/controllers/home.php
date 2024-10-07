<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash'] = 'You must log in to access that page.';
    header('Location: /login');  // Redirect to login if not logged in
    die();
}
require "views/home.view.php";