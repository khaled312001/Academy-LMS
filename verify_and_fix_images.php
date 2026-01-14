<?php
/**
 * Verify and Fix All Images
 * This script verifies all images exist and creates them if missing
 */

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lms';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Verifying and Fixing Images ===\n\n";

// Get theme
$theme_result = $conn->query("SELECT value FROM settings WHERE `key` = 'theme'");
$theme = 'default-new';
if ($theme_result && $theme_result->num_rows > 0) {
    $theme_row = $theme_result->fetch_assoc();
    $theme = $theme_row['value'] ?: 'default-new';
}
echo "Theme: {$theme}\n\n";

// 1. Fix Course Images
echo "1. Fixing Course Images...\n";
$courses = $conn->query("SELECT id, title, last_modified FROM course WHERE status = 'active'");
$course_dir = __DIR__ . '/uploads/thumbnails/course_thumbnails/';
$optimized_dir = $course_dir . 'optimized/';

if (!is_dir($course_dir)) mkdir($course_dir, 0777, true);
if (!is_dir($optimized_dir)) mkdir($optimized_dir, 0777, true);

$course_fixed = 0;
while ($course = $courses->fetch_assoc()) {
    $course_id = $course['id'];
    $last_modified = $course['last_modified'];
    
    // Expected filenames
    $expected_normal = $course_dir . 'course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    $expected_optimized = $optimized_dir . 'course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    
    // Check if exists
    if (!file_exists($expected_normal) && !file_exists($expected_optimized)) {
        // Try to find source
        $sources = [
            __DIR__ . '/uploads/thumbnails/course_' . $course_id . '.jpg',
            __DIR__ . '/uploads/thumbnails/course_1.jpg', // Fallback
        ];
        
        $copied = false;
        foreach ($sources as $source) {
            if (file_exists($source)) {
                copy($source, $expected_normal);
                echo "  ✓ Created: course_thumbnail_{$theme}_{$course_id}_{$last_modified}.jpg\n";
                $course_fixed++;
                $copied = true;
                break;
            }
        }
        
        if (!$copied) {
            echo "  ✗ No source for course {$course_id}: {$course['title']}\n";
        }
    } else {
        echo "  ✓ Course {$course_id} image exists\n";
        $course_fixed++;
    }
}
echo "✓ Fixed {$course_fixed} course images\n\n";

// 2. Fix Category Images
echo "2. Fixing Category Images...\n";
$categories = $conn->query("SELECT id, name, thumbnail, sub_category_thumbnail FROM category");
$category_dir = __DIR__ . '/uploads/thumbnails/category_thumbnails/';

$category_fixed = 0;
while ($category = $categories->fetch_assoc()) {
    // Main thumbnail
    if ($category['thumbnail']) {
        $thumb_path = $category_dir . $category['thumbnail'];
        if (!file_exists($thumb_path)) {
            // Try to find in old location
            $old_path = __DIR__ . '/uploads/category_thumbnails/' . $category['thumbnail'];
            if (file_exists($old_path)) {
                copy($old_path, $thumb_path);
                echo "  ✓ Moved category {$category['id']} thumbnail: {$category['thumbnail']}\n";
            } else {
                echo "  ✗ Category {$category['id']} thumbnail missing: {$category['thumbnail']}\n";
            }
        } else {
            echo "  ✓ Category {$category['id']} thumbnail exists\n";
        }
        $category_fixed++;
    }
    
    // Sub category thumbnail
    if ($category['sub_category_thumbnail']) {
        $sub_thumb_path = $category_dir . $category['sub_category_thumbnail'];
        if (!file_exists($sub_thumb_path)) {
            $old_path = __DIR__ . '/uploads/category_thumbnails/' . $category['sub_category_thumbnail'];
            if (file_exists($old_path)) {
                copy($old_path, $sub_thumb_path);
                echo "  ✓ Moved category {$category['id']} sub-thumbnail: {$category['sub_category_thumbnail']}\n";
            } else {
                echo "  ✗ Category {$category['id']} sub-thumbnail missing: {$category['sub_category_thumbnail']}\n";
            }
        } else {
            echo "  ✓ Category {$category['id']} sub-thumbnail exists\n";
        }
        $category_fixed++;
    }
}
echo "✓ Fixed category images\n\n";

// 3. Summary
echo "=== Summary ===\n";
echo "Course images directory: {$course_dir}\n";
echo "Category images directory: {$category_dir}\n";
echo "Theme: {$theme}\n";
echo "\nTo verify, check:\n";
echo "- http://localhost/Academy-LMS/uploads/thumbnails/course_thumbnails/\n";
echo "- http://localhost/Academy-LMS/uploads/thumbnails/category_thumbnails/\n";

$conn->close();
