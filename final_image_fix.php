<?php
/**
 * Final Image Fix - Comprehensive solution
 * This script ensures all images are accessible and properly configured
 */

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lms';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Final Image Fix ===\n\n";

// Get theme from frontend_settings
$theme_result = $conn->query("SELECT value FROM frontend_settings WHERE `key` = 'theme'");
$theme = 'default-new';
if ($theme_result && $theme_result->num_rows > 0) {
    $theme_row = $theme_result->fetch_assoc();
    $theme = $theme_row['value'] ?: 'default-new';
}
echo "Theme: {$theme}\n\n";

$base_path = __DIR__;
$issues = [];
$fixed = [];

// 1. Fix Course Images
echo "1. Course Images:\n";
$courses = $conn->query("SELECT id, title, last_modified FROM course WHERE status = 'active'");
$course_dir = $base_path . '/uploads/thumbnails/course_thumbnails/';
$optimized_dir = $course_dir . 'optimized/';

if (!is_dir($course_dir)) mkdir($course_dir, 0777, true);
if (!is_dir($optimized_dir)) mkdir($optimized_dir, 0777, true);

while ($course = $courses->fetch_assoc()) {
    $course_id = $course['id'];
    $last_modified = $course['last_modified'];
    
    $normal_file = $course_dir . 'course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    $optimized_file = $optimized_dir . 'course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    
    if (!file_exists($normal_file) && !file_exists($optimized_file)) {
        // Try to find and copy
        $sources = glob($base_path . '/uploads/thumbnails/course_*.jpg');
        if (!empty($sources)) {
            copy($sources[0], $normal_file);
            echo "  ✓ Created: course_thumbnail_{$theme}_{$course_id}_{$last_modified}.jpg\n";
            $fixed[] = "Course {$course_id}";
        } else {
            echo "  ✗ Missing: Course {$course_id}\n";
            $issues[] = "Course {$course_id} - No source image found";
        }
    } else {
        echo "  ✓ Course {$course_id} OK\n";
    }
}

// 2. Fix Category Images
echo "\n2. Category Images:\n";
$categories = $conn->query("SELECT id, name, thumbnail, sub_category_thumbnail FROM category");
$category_dir = $base_path . '/uploads/thumbnails/category_thumbnails/';

if (!is_dir($category_dir)) mkdir($category_dir, 0777, true);

while ($category = $categories->fetch_assoc()) {
    // Main thumbnail
    if ($category['thumbnail']) {
        $thumb_file = $category_dir . $category['thumbnail'];
        if (!file_exists($thumb_file)) {
            $old_path = $base_path . '/uploads/category_thumbnails/' . $category['thumbnail'];
            if (file_exists($old_path)) {
                copy($old_path, $thumb_file);
                echo "  ✓ Moved: {$category['thumbnail']}\n";
                $fixed[] = "Category {$category['id']} thumbnail";
            } else {
                echo "  ✗ Missing: {$category['thumbnail']}\n";
                $issues[] = "Category {$category['id']} thumbnail missing";
            }
        } else {
            echo "  ✓ Category {$category['id']} thumbnail OK\n";
        }
    }
    
    // Sub thumbnail
    if ($category['sub_category_thumbnail']) {
        $sub_file = $category_dir . $category['sub_category_thumbnail'];
        if (!file_exists($sub_file)) {
            $old_path = $base_path . '/uploads/category_thumbnails/' . $category['sub_category_thumbnail'];
            if (file_exists($old_path)) {
                copy($old_path, $sub_file);
                echo "  ✓ Moved: {$category['sub_category_thumbnail']}\n";
                $fixed[] = "Category {$category['id']} sub-thumbnail";
            } else {
                echo "  ✗ Missing: {$category['sub_category_thumbnail']}\n";
                $issues[] = "Category {$category['id']} sub-thumbnail missing";
            }
        } else {
            echo "  ✓ Category {$category['id']} sub-thumbnail OK\n";
        }
    }
}

// 3. Verify User Images
echo "\n3. User Images:\n";
$users = $conn->query("SELECT id, first_name, last_name, image FROM users WHERE image IS NOT NULL AND image != ''");
$user_dir = $base_path . '/uploads/user_image/';

while ($user = $users->fetch_assoc()) {
    $image_name = $user['image'];
    // Remove .jpg if present (should already be fixed)
    $image_name = preg_replace('/\.jpg$/i', '', $image_name);
    
    $image_file = $user_dir . $image_name . '.jpg';
    if (!file_exists($image_file)) {
        echo "  ✗ Missing: User {$user['id']} - {$image_name}.jpg\n";
        $issues[] = "User {$user['id']} image missing";
    } else {
        echo "  ✓ User {$user['id']} OK\n";
    }
    
    // Update database if needed
    if ($user['image'] != $image_name) {
        $stmt = $conn->prepare("UPDATE users SET image = ? WHERE id = ?");
        $stmt->bind_param("si", $image_name, $user['id']);
        $stmt->execute();
    }
}

// Summary
echo "\n=== Summary ===\n";
echo "Fixed: " . count($fixed) . " items\n";
if (count($issues) > 0) {
    echo "Issues: " . count($issues) . "\n";
    foreach ($issues as $issue) {
        echo "  - {$issue}\n";
    }
} else {
    echo "All images are properly configured!\n";
}

echo "\n=== Next Steps ===\n";
echo "1. Clear browser cache (Ctrl+F5 or Ctrl+Shift+R)\n";
echo "2. Visit: http://localhost/Academy-LMS/test_images.html to test image access\n";
echo "3. If images still don't show, check:\n";
echo "   - Apache mod_rewrite is enabled\n";
echo "   - .htaccess file allows image access\n";
echo "   - File permissions (images should be readable)\n";

$conn->close();
