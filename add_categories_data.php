<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Simple script to add sample categories data
require_once 'application/config/database.php';

$conn = new mysqli($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

// Add categories data
$sql = "
// Add categories first
INSERT IGNORE INTO `category` (`id`, `code`, `name`, `parent`, `slug`, `date_added`, `last_modified`, `font_awesome_class`, `thumbnail`, `sub_category_thumbnail`) VALUES
(1, 'WEB', 'Web Development', 0, 'web-development', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-code', 'web-dev.jpg', 'web-dev-sub.jpg'),
(2, 'DATA', 'Data Science', 0, 'data-science', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-chart-line', 'data-science.jpg', 'data-science-sub.jpg'),
(3, 'DESIGN', 'Design', 0, 'design', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-palette', 'design.jpg', 'design-sub.jpg'),
(4, 'PHOTO', 'Photography', 0, 'photography', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-camera', 'photography.jpg', 'photography-sub.jpg'),
(5, 'MARKET', 'Marketing', 0, 'marketing', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-bullhorn', 'marketing.jpg', 'marketing-sub.jpg'),
(6, 'JS', 'JavaScript', 1, 'javascript', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-js', NULL, NULL),
(7, 'PYTHON', 'Python', 2, 'python', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-python', NULL, NULL),
(8, 'UIUX', 'UI/UX Design', 3, 'ui-ux-design', UNIX_TIMESTAMP('2024-01-01'), UNIX_TIMESTAMP('2024-01-01'), 'fa-paint-brush', NULL, NULL);

// Add a sample course to make categories appear
INSERT IGNORE INTO `course` (`id`, `title`, `short_description`, `description`, `outcomes`, `faqs`, `language`, `category_id`, `sub_category_id`, `section`, `requirements`, `price`, `discount_flag`, `discounted_price`, `level`, `user_id`, `thumbnail`, `video_url`, `date_added`, `last_modified`, `course_type`, `is_top_course`, `is_admin`, `status`, `course_overview_provider`, `meta_keywords`, `meta_description`, `is_free_course`, `multi_instructor`, `enable_drip_content`, `creator`, `expiry_period`, `upcoming_image_thumbnail`, `publish_date`) VALUES
(1, 'Complete Web Development Bootcamp', 'Master web development from scratch with HTML, CSS, JavaScript, and modern frameworks', '<p>This comprehensive course will take you from beginner to advanced web developer.</p>', '["Build websites", "Learn JavaScript", "Master frameworks"]', '[]', 'english', 1, 6, NULL, '["Computer", "Internet"]', 99.99, 0, NULL, 'beginner', '1', 'course_1.jpg', '', UNIX_TIMESTAMP('2024-01-15'), UNIX_TIMESTAMP('2024-01-15'), 'general', 1, 0, 'active', 'youtube', 'web development', 'Learn web development', 0, 0, 0, 1, NULL, NULL, NULL);
";

if ($conn->multi_query($sql)) {
    echo "Sample categories data added successfully!<br>";
    echo "Category icons should now display properly.<br>";
} else {
    echo "Error: " . $conn->error . "<br>";
}

$conn->close();
?>