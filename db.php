<?php
// Define the database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'stream');

// Create a new MySQLi object
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if ($conn->connect_error) {
  die('Error connecting to the database: ' . $conn->connect_error);
}

// If the connection was successful, print a success message

?>

