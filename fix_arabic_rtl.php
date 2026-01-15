<?php
/**
 * Script to fix Arabic language direction to RTL
 * 
 * Usage: 
 * 1. Open this file in your browser: https://your-domain.com/fix_arabic_rtl.php
 * 2. Or run via command line: php fix_arabic_rtl.php
 * 
 * After running, delete this file for security.
 */

// Prevent direct access in production (optional - remove if you want to run via browser)
// if (!defined('STDIN') && $_SERVER['SERVER_NAME'] !== 'localhost') {
//     die('Access denied');
// }

// Define BASEPATH constant (required by database.php)
if (!defined('BASEPATH')) {
    define('BASEPATH', __DIR__ . '/system/');
}

// Load database configuration
require_once('application/config/database.php');

// Get database settings
$db_config = $db['default'];
$hostname = $db_config['hostname'];
$username = $db_config['username'];
$password = $db_config['password'];
$database = $db_config['database'];
$dbdriver = $db_config['dbdriver'];

// Connect to database
if ($dbdriver === 'mysqli') {
    $conn = new mysqli($hostname, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    // Get current language_dirs setting
    $result = $conn->query("SELECT * FROM settings WHERE `key` = 'language_dirs'");
    
    // Default language directions
    $language_dirs = ['english' => 'ltr', 'arabic' => 'rtl', 'hindi' => 'rtl'];
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $existing_dirs = json_decode($row['value'], true);
        
        if (is_array($existing_dirs)) {
            $language_dirs = array_merge($language_dirs, $existing_dirs);
        }
        
        // Ensure Arabic is set to RTL
        $language_dirs['arabic'] = 'rtl';
        
        // Update the setting
        $json_value = json_encode($language_dirs);
        $stmt = $conn->prepare("UPDATE settings SET `value` = ? WHERE `key` = 'language_dirs'");
        $stmt->bind_param("s", $json_value);
        
        if ($stmt->execute()) {
            echo "✓ تم تحديث اتجاه اللغة العربية إلى RTL بنجاح!<br>\n";
            echo "✓ Arabic language direction has been updated to RTL successfully!<br><br>\n";
        } else {
            echo "✗ Error updating: " . $stmt->error . "<br>\n";
        }
        
        $stmt->close();
    } else {
        // Insert new setting
        $json_value = json_encode($language_dirs);
        $stmt = $conn->prepare("INSERT INTO settings (`key`, `value`) VALUES ('language_dirs', ?)");
        $stmt->bind_param("s", $json_value);
        
        if ($stmt->execute()) {
            echo "✓ تم إنشاء إعداد اتجاه اللغة العربية إلى RTL بنجاح!<br>\n";
            echo "✓ Arabic language direction setting has been created successfully!<br><br>\n";
        } else {
            echo "✗ Error inserting: " . $stmt->error . "<br>\n";
        }
        
        $stmt->close();
    }
    
    echo "Current language directions:<br>\n";
    echo "<pre>" . print_r($language_dirs, true) . "</pre>\n";
    
    $conn->close();
} else {
    die("Unsupported database driver: " . $dbdriver);
}

echo "<br><br><strong>ملاحظة:</strong> يمكنك أيضاً تعديل اتجاه اللغة من لوحة التحكم:<br>";
echo "<strong>Note:</strong> You can also change language direction from admin panel:<br>";
echo "Admin Panel → Language → Manage Language → Set Arabic to RTL<br><br>";

echo "<br>يمكنك حذف هذا الملف الآن.<br>";
echo "You can delete this file now.";
