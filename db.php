<?php
$servername = "localhost";
$username = "root";
$password = ""; // Change this to your MySQL password
$dbname = "ex1db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>