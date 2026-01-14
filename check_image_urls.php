<?php
/**
 * Check Image URLs - Debug script
 */

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lms';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get theme
$theme_result = $conn->query("SELECT value FROM settings WHERE `key` = 'theme'");
$theme = 'default-new';
if ($theme_result && $theme_result->num_rows > 0) {
    $theme_row = $theme_result->fetch_assoc();
    $theme = $theme_row['value'] ?: 'default-new';
}

echo "=== Image URL Check ===\n";
echo "Theme: {$theme}\n\n";

// Check courses
echo "COURSE IMAGES:\n";
$courses = $conn->query("SELECT id, title, last_modified FROM course WHERE status = 'active' LIMIT 3");
while ($course = $courses->fetch_assoc()) {
    $course_id = $course['id'];
    $last_modified = $course['last_modified'];
    
    $expected_file = __DIR__ . '/uploads/thumbnails/course_thumbnails/course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    $expected_url = 'http://localhost/Academy-LMS/uploads/thumbnails/course_thumbnails/course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    
    echo "Course {$course_id}: {$course['title']}\n";
    echo "  Last Modified: {$last_modified}\n";
    echo "  Expected File: course_thumbnail_{$theme}_{$course_id}_{$last_modified}.jpg\n";
    echo "  File Exists: " . (file_exists($expected_file) ? "YES" : "NO") . "\n";
    echo "  URL: {$expected_url}\n";
    echo "\n";
}

// Check categories
echo "\nCATEGORY IMAGES:\n";
$categories = $conn->query("SELECT id, name, thumbnail, sub_category_thumbnail FROM category WHERE parent = 0 LIMIT 3");
while ($category = $categories->fetch_assoc()) {
    echo "Category {$category['id']}: {$category['name']}\n";
    if ($category['thumbnail']) {
        $thumb_file = __DIR__ . '/uploads/thumbnails/category_thumbnails/' . $category['thumbnail'];
        $thumb_url = 'http://localhost/Academy-LMS/uploads/thumbnails/category_thumbnails/' . $category['thumbnail'];
        echo "  Thumbnail: {$category['thumbnail']}\n";
        echo "  File Exists: " . (file_exists($thumb_file) ? "YES" : "NO") . "\n";
        echo "  URL: {$thumb_url}\n";
    }
    if ($category['sub_category_thumbnail']) {
        $sub_file = __DIR__ . '/uploads/thumbnails/category_thumbnails/' . $category['sub_category_thumbnail'];
        $sub_url = 'http://localhost/Academy-LMS/uploads/thumbnails/category_thumbnails/' . $category['sub_category_thumbnail'];
        echo "  Sub-Thumbnail: {$category['sub_category_thumbnail']}\n";
        echo "  File Exists: " . (file_exists($sub_file) ? "YES" : "NO") . "\n";
        echo "  URL: {$sub_url}\n";
    }
    echo "\n";
}

$conn->close();
