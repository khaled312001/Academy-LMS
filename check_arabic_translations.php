<?php
/**
 * Script to check and add missing Arabic translations
 * 
 * This script compares English and Arabic language files
 * and identifies missing translations
 */

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

// Load JSON files
$english_file = 'languages/english.json';
$arabic_file = 'languages/arabic.json';

if (!file_exists($english_file)) {
    die("Error: English language file not found: $english_file\n");
}

if (!file_exists($arabic_file)) {
    die("Error: Arabic language file not found: $arabic_file\n");
}

$english_json = json_decode(file_get_contents($english_file), true);
$arabic_json = json_decode(file_get_contents($arabic_file), true);

if (!$english_json) {
    die("Error: Failed to parse English JSON file\n");
}

if (!$arabic_json) {
    $arabic_json = [];
}

echo "=== فحص الترجمات العربية ===\n";
echo "=== Checking Arabic Translations ===\n\n";

$missing_keys = [];
$empty_values = [];
$total_keys = count($english_json);
$translated_keys = 0;

foreach ($english_json as $key => $english_value) {
    if (!isset($arabic_json[$key])) {
        $missing_keys[$key] = $english_value;
    } elseif (empty($arabic_json[$key]) || $arabic_json[$key] === null) {
        $empty_values[$key] = $english_value;
    } else {
        $translated_keys++;
    }
}

echo "إجمالي المفاتيح: $total_keys\n";
echo "المفاتيح المترجمة: $translated_keys\n";
echo "المفاتيح المفقودة: " . count($missing_keys) . "\n";
echo "المفاتيح الفارغة: " . count($empty_values) . "\n\n";

echo "Total keys: $total_keys\n";
echo "Translated keys: $translated_keys\n";
echo "Missing keys: " . count($missing_keys) . "\n";
echo "Empty values: " . count($empty_values) . "\n\n";

// Add missing keys with English text as placeholder
if (count($missing_keys) > 0 || count($empty_values) > 0) {
    echo "=== إضافة الترجمات المفقودة ===\n";
    echo "=== Adding Missing Translations ===\n\n";
    
    foreach ($missing_keys as $key => $english_value) {
        // Use English text as placeholder (you should translate these)
        $arabic_json[$key] = $english_value;
        echo "Added missing key: $key\n";
    }
    
    foreach ($empty_values as $key => $english_value) {
        // Use English text as placeholder if empty
        if (empty($arabic_json[$key])) {
            $arabic_json[$key] = $english_value;
            echo "Filled empty value: $key\n";
        }
    }
    
    // Sort keys alphabetically for better organization
    ksort($arabic_json);
    
    // Save updated Arabic JSON with proper formatting
    $json_output = json_encode($arabic_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    
    // Ensure proper JSON formatting (single line format like English file)
    // But keep it readable - use compact format
    $json_output = json_encode($arabic_json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    file_put_contents($arabic_file, $json_output);
    
    echo "\n✓ تم حفظ ملف اللغة العربية المحدث\n";
    echo "✓ Arabic language file has been saved\n\n";
}

// Update database if connection is available
if ($dbdriver === 'mysqli') {
    $conn = new mysqli($hostname, $username, $password, $database);
    
    if ($conn->connect_error) {
        echo "Warning: Could not connect to database: " . $conn->connect_error . "\n";
        echo "Please update translations manually from admin panel.\n";
    } else {
        $conn->set_charset("utf8");
        
        echo "=== تحديث قاعدة البيانات ===\n";
        echo "=== Updating Database ===\n\n";
        
        $updated = 0;
        $inserted = 0;
        
        foreach ($arabic_json as $key => $arabic_value) {
            // Check if phrase exists
            $stmt = $conn->prepare("SELECT phrase FROM language WHERE phrase = ?");
            $stmt->bind_param("s", $key);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                // Update existing phrase
                // Check if arabic column exists
                $check_column = $conn->query("SHOW COLUMNS FROM language LIKE 'arabic'");
                if ($check_column->num_rows == 0) {
                    $conn->query("ALTER TABLE language ADD COLUMN arabic LONGTEXT NULL");
                }
                
                $update_stmt = $conn->prepare("UPDATE language SET arabic = ? WHERE phrase = ?");
                $update_stmt->bind_param("ss", $arabic_value, $key);
                if ($update_stmt->execute()) {
                    $updated++;
                }
                $update_stmt->close();
            } else {
                // Insert new phrase
                $insert_stmt = $conn->prepare("INSERT INTO language (phrase, english, arabic) VALUES (?, ?, ?)");
                $english_value = isset($english_json[$key]) ? $english_json[$key] : '';
                $insert_stmt->bind_param("sss", $key, $english_value, $arabic_value);
                if ($insert_stmt->execute()) {
                    $inserted++;
                }
                $insert_stmt->close();
            }
            
            $stmt->close();
        }
        
        echo "تم تحديث: $updated سجل\n";
        echo "تم إضافة: $inserted سجل جديد\n\n";
        echo "Updated: $updated records\n";
        echo "Inserted: $inserted new records\n\n";
        
        $conn->close();
    }
}

echo "=== ملخص ===\n";
echo "=== Summary ===\n\n";
echo "ملف اللغة العربية: $arabic_file\n";
echo "Arabic language file: $arabic_file\n";
echo "يرجى مراجعة الترجمات المضافة وترجمتها بشكل صحيح.\n";
echo "Please review the added translations and translate them properly.\n";
echo "\nيمكنك حذف هذا الملف بعد الانتهاء.\n";
echo "You can delete this file after completion.\n";
