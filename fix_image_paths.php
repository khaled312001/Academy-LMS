<?php
/**
 * Fix Image Paths Script for Academy LMS
 * This script fixes image paths and moves images to correct locations
 */

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lms';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Fixing Image Paths ===\n\n";

// 1. Fix user images - remove .jpg extension from database
echo "1. Fixing user images in database...\n";
$users = $conn->query("SELECT id, image FROM users WHERE image IS NOT NULL AND image != ''");
while ($user = $users->fetch_assoc()) {
    $old_image = $user['image'];
    // Remove .jpg extension if present
    $new_image = preg_replace('/\.jpg$/i', '', $old_image);
    
    if ($old_image != $new_image) {
        $stmt = $conn->prepare("UPDATE users SET image = ? WHERE id = ?");
        $stmt->bind_param("si", $new_image, $user['id']);
        $stmt->execute();
        echo "  Updated user {$user['id']}: {$old_image} -> {$new_image}\n";
    }
}
echo "✓ User images fixed\n\n";

// 2. Move course images to correct location with correct naming
echo "2. Moving course images to correct location...\n";
$courses = $conn->query("SELECT id, thumbnail, last_modified FROM course WHERE thumbnail IS NOT NULL AND thumbnail != ''");
$theme = 'default-new'; // Default theme, change if different

// Create directory if it doesn't exist
$course_thumb_dir = __DIR__ . '/uploads/thumbnails/course_thumbnails/';
if (!is_dir($course_thumb_dir)) {
    mkdir($course_thumb_dir, 0777, true);
    echo "  Created directory: {$course_thumb_dir}\n";
}

$moved = 0;
while ($course = $courses->fetch_assoc()) {
    $course_id = $course['id'];
    $last_modified = $course['last_modified'];
    $old_thumbnail = $course['thumbnail'];
    
    // Source file (where we downloaded it)
    $source_file = __DIR__ . '/uploads/thumbnails/' . $old_thumbnail;
    
    // Destination file (where application expects it)
    $dest_file = $course_thumb_dir . 'course_thumbnail_' . $theme . '_' . $course_id . '_' . $last_modified . '.jpg';
    
    if (file_exists($source_file)) {
        if (copy($source_file, $dest_file)) {
            echo "  Moved course {$course_id}: {$old_thumbnail} -> course_thumbnail_{$theme}_{$course_id}_{$last_modified}.jpg\n";
            $moved++;
        } else {
            echo "  ✗ Failed to move course {$course_id}\n";
        }
    } else {
        echo "  ✗ Source file not found: {$source_file}\n";
    }
}
echo "✓ Moved {$moved} course images\n\n";

// 3. Verify category images are in correct location
echo "3. Verifying category images...\n";
$categories = $conn->query("SELECT id, thumbnail, sub_category_thumbnail FROM category WHERE thumbnail IS NOT NULL");
$category_dir = __DIR__ . '/uploads/thumbnails/category_thumbnails/';

$verified = 0;
while ($category = $categories->fetch_assoc()) {
    if ($category['thumbnail'] && file_exists($category_dir . $category['thumbnail'])) {
        $verified++;
    }
    if ($category['sub_category_thumbnail'] && file_exists($category_dir . $category['sub_category_thumbnail'])) {
        $verified++;
    }
}
echo "✓ Verified {$verified} category images\n\n";

// 4. Verify user images exist
echo "4. Verifying user images...\n";
$users = $conn->query("SELECT id, image FROM users WHERE image IS NOT NULL AND image != ''");
$user_dir = __DIR__ . '/uploads/user_image/';

$user_verified = 0;
while ($user = $users->fetch_assoc()) {
    $image_file = $user_dir . $user['image'] . '.jpg';
    if (file_exists($image_file)) {
        $user_verified++;
    } else {
        echo "  ✗ User image not found: {$image_file}\n";
    }
}
echo "✓ Verified {$user_verified} user images\n\n";

// 5. Verify blog images
echo "5. Verifying blog images...\n";
$blogs = $conn->query("SELECT blog_id, thumbnail, banner FROM blogs WHERE thumbnail IS NOT NULL");
$blog_dir = __DIR__ . '/uploads/blog/';

$blog_verified = 0;
while ($blog = $blogs->fetch_assoc()) {
    if ($blog['thumbnail'] && file_exists($blog_dir . $blog['thumbnail'])) {
        $blog_verified++;
    }
    if ($blog['banner'] && file_exists($blog_dir . $blog['banner'])) {
        $blog_verified++;
    }
}
echo "✓ Verified {$blog_verified} blog images\n\n";

echo "=== Done ===\n";
$conn->close();
