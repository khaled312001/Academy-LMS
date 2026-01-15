<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Simple script to add sample course data
require_once 'application/config/database.php';

$conn = new mysqli($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

// Read and execute SQL file
$sql = file_get_contents('add_sample_course.sql');

if ($conn->multi_query($sql)) {
    echo "Sample course data added successfully!<br>";
    echo "You can now visit the website to see course images.<br>";
} else {
    echo "Error: " . $conn->error . "<br>";
}

$conn->close();
?>