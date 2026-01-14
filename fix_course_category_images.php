<?php
/**
 * Fix Course and Category Images Script
 * This script ensures all images are in the correct locations with correct names
 */

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lms';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Fixing Course and Category Images ===\n\n";

// Get theme name
$theme_result = $conn->query("SELECT value FROM settings WHERE `key` = 'theme'");
$theme = 'default-new'; // Default
if ($theme_result && $theme_result->num_rows > 0) {
    $theme_row = $theme_result->fetch_assoc();
    $theme = $theme_row['value'] ?: 'default-new';
}
echo "Using theme: {$theme}\n\n";

// 1. Fix Course Images
echo "1. Fixing course images...\n";
$courses = $conn->query("SELECT id, thumbnail, last_modified FROM course WHERE status = 'active'");
$course_dir = __DIR__ . '/uploads/thumbnails/course_thumbnails/';

if (!is_dir($course_dir)) {
    mkdir($course_dir, 0777, true);
}

$course_fixed = 0;
while ($course = $courses->fetch_assoc()) {
    $course_id = $course['id'];
    $last_modified = $course['last_modified'];
    
    // Expected filename
    $expected_file = $course_dir . 'course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    
    // Check if file exists
    if (!file_exists($expected_file)) {
        // Try to find source file
        $source_files = [
            __DIR__ . '/uploads/thumbnails/course_' . $course_id . '.jpg',
            __DIR__ . '/uploads/thumbnails/course_' . $course_id . '.jpg',
        ];
        
        $found = false;
        foreach ($source_files as $source) {
            if (file_exists($source)) {
                copy($source, $expected_file);
                echo "  ✓ Created: course_thumbnail_{$theme}_{$course_id}_{$last_modified}.jpg\n";
                $course_fixed++;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            // Try to copy from any course image
            $all_course_images = glob(__DIR__ . '/uploads/thumbnails/course_*.jpg');
            if (!empty($all_course_images)) {
                $source = $all_course_images[0];
                copy($source, $expected_file);
                echo "  ✓ Created from generic: course_thumbnail_{$theme}_{$course_id}_{$last_modified}.jpg\n";
                $course_fixed++;
            } else {
                echo "  ✗ No source image found for course {$course_id}\n";
            }
        }
    } else {
        echo "  ✓ Course {$course_id} image exists\n";
        $course_fixed++;
    }
}
echo "✓ Fixed {$course_fixed} course images\n\n";

// 2. Verify Category Images
echo "2. Verifying category images...\n";
$categories = $conn->query("SELECT id, name, thumbnail, sub_category_thumbnail FROM category");
$category_dir = __DIR__ . '/uploads/thumbnails/category_thumbnails/';

$category_fixed = 0;
while ($category = $categories->fetch_assoc()) {
    // Check main thumbnail
    if ($category['thumbnail']) {
        $thumb_file = $category_dir . $category['thumbnail'];
        if (!file_exists($thumb_file)) {
            echo "  ✗ Category {$category['id']} ({$category['name']}) thumbnail missing: {$category['thumbnail']}\n";
        } else {
            echo "  ✓ Category {$category['id']} thumbnail exists\n";
            $category_fixed++;
        }
    }
    
    // Check sub category thumbnail
    if ($category['sub_category_thumbnail']) {
        $sub_thumb_file = $category_dir . $category['sub_category_thumbnail'];
        if (!file_exists($sub_thumb_file)) {
            echo "  ✗ Category {$category['id']} sub-thumbnail missing: {$category['sub_category_thumbnail']}\n";
        } else {
            echo "  ✓ Category {$category['id']} sub-thumbnail exists\n";
            $category_fixed++;
        }
    }
}
echo "✓ Verified category images\n\n";

// 3. Create optimized directory for course images
$optimized_dir = $course_dir . 'optimized/';
if (!is_dir($optimized_dir)) {
    mkdir($optimized_dir, 0777, true);
    echo "Created optimized directory\n";
}

echo "=== Done ===\n";
$conn->close();
