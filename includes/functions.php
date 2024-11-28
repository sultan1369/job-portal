<?php
// functions.php

include_once('includes/db.php'); // Include the database connection
include_once('includes/session.php'); // Include session management

// Function to sanitize user input
function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data))); // Sanitize input data
}

// Function to hash passwords
function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT); // Hash the password
}

// Function to verify passwords
function verifyPassword($password, $hashedPassword)
{
    return password_verify($password, $hashedPassword); // Verify the hashed password
}

// Function to log in the user
function login($username, $password)
{
    global $conn; // Make sure you have a global connection variable
    $username = mysqli_real_escape_string($conn, $username); // Prevent SQL injection

    // Prepare the SQL statement
    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1"; // Adjust the table name if necessary
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password (assuming you are using password_hash)
        if (verifyPassword($password, $user['password'])) { // Use the verifyPassword function
            // Start the session and set session variables
            session_start();
            $_SESSION['user_id'] = $user['id']; // Assuming 'id' is the primary key
            $_SESSION['username'] = $user['username'];
            return true; // Login successful
        } else {
            return false; // Invalid password
        }
    }
    return false; // Invalid username
}
