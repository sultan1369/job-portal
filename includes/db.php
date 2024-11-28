<?php
// db.php

$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = "sultan1369"; // Your database password
$dbname = "job_portal"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set character set to utf8
$conn->set_charset("utf8");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
