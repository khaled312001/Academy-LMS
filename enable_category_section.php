<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Script to enable category section
require_once 'application/config/database.php';

$conn = new mysqli($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

// Enable top category section
$sql = "UPDATE `frontend_settings` SET `value` = '1' WHERE `key` = 'top_category_section'";

if ($conn->query($sql) === TRUE) {
    echo "Top category section enabled successfully!<br>";
    echo "Category icons should now be visible on the homepage.<br>";
} else {
    echo "Error: " . $conn->error . "<br>";
}

$conn->close();
?>