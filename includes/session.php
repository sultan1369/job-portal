<?php
// session.php

// Start the session only if it hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to check if the user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Function to log out the user
function logout()
{
    session_unset(); // Free all session variables
    session_destroy(); // Destroy the session
}
