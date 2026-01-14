<?php
/**
 * Test Image Access
 */

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lms';

$conn = new mysqli($host, $username, $password, $database);

// Get theme from frontend_settings
$theme_result = $conn->query("SELECT value FROM frontend_settings WHERE `key` = 'theme'");
$theme = 'default-new';
if ($theme_result && $theme_result->num_rows > 0) {
    $theme_row = $theme_result->fetch_assoc();
    $theme = $theme_row['value'] ?: 'default-new';
}

echo "Theme: {$theme}\n\n";

// Test course images
echo "Testing Course Images:\n";
$courses = $conn->query("SELECT id, last_modified FROM course WHERE status = 'active' LIMIT 3");
while ($course = $courses->fetch_assoc()) {
    $course_id = $course['id'];
    $last_modified = $course['last_modified'];
    
    $file_path = __DIR__ . '/uploads/thumbnails/course_thumbnails/course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    $url_path = 'uploads/thumbnails/course_thumbnails/course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    
    echo "Course {$course_id}:\n";
    echo "  File exists: " . (file_exists($file_path) ? "YES" : "NO") . "\n";
    echo "  File size: " . (file_exists($file_path) ? filesize($file_path) : "N/A") . " bytes\n";
    echo "  URL: http://localhost/Academy-LMS/{$url_path}\n";
    echo "\n";
}

// Test category images
echo "\nTesting Category Images:\n";
$categories = $conn->query("SELECT id, name, thumbnail FROM category WHERE parent = 0 LIMIT 3");
while ($category = $categories->fetch_assoc()) {
    if ($category['thumbnail']) {
        $file_path = __DIR__ . '/uploads/thumbnails/category_thumbnails/' . $category['thumbnail'];
        $url_path = 'uploads/thumbnails/category_thumbnails/' . $category['thumbnail'];
        
        echo "Category {$category['id']} ({$category['name']}):\n";
        echo "  File exists: " . (file_exists($file_path) ? "YES" : "NO") . "\n";
        echo "  File size: " . (file_exists($file_path) ? filesize($file_path) : "N/A") . " bytes\n";
        echo "  URL: http://localhost/Academy-LMS/{$url_path}\n";
        echo "\n";
    }
}

$conn->close();
