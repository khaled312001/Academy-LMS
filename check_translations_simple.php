<?php
/**
 * Simple script to check and add missing Arabic translations
 * Without database dependencies
 */

// Load JSON files
$english_file = 'languages/english.json';
$arabic_file = 'languages/arabic.json';

echo "Checking files...\n";

if (!file_exists($english_file)) {
    die("ERROR: English language file not found: $english_file\n");
}

if (!file_exists($arabic_file)) {
    die("ERROR: Arabic language file not found: $arabic_file\n");
}

echo "✓ Files found\n";

echo "Loading JSON files...\n";

$english_content = file_get_contents($english_file);
$arabic_content = file_get_contents($arabic_file);

$english_json = json_decode($english_content, true);
$arabic_json = json_decode($arabic_content, true);

if (!$english_json) {
    $error = json_last_error_msg();
    die("ERROR: Failed to parse English JSON file: $error\n");
}

if (!$arabic_json) {
    $arabic_json = [];
    echo "Warning: Arabic JSON is empty or invalid, starting fresh\n";
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

// Show missing keys
if (count($missing_keys) > 0) {
    echo "=== المفاتيح المفقودة (Missing Keys) ===\n";
    foreach ($missing_keys as $key => $value) {
        echo "$key: $value\n";
    }
    echo "\n";
}

// Show empty values
if (count($empty_values) > 0) {
    echo "=== المفاتيح الفارغة (Empty Values) ===\n";
    foreach ($empty_values as $key => $value) {
        echo "$key: $value\n";
    }
    echo "\n";
}

echo "=== ملخص ===\n";
echo "=== Summary ===\n\n";
echo "ملف اللغة العربية: $arabic_file\n";
echo "Arabic language file: $arabic_file\n";

if (count($missing_keys) > 0 || count($empty_values) > 0) {
    echo "\nيوجد ترجمات مفقودة تحتاج إلى الترجمة.\n";
    echo "There are missing translations that need to be translated.\n";
} else {
    echo "\n✓ جميع الترجمات موجودة!\n";
    echo "✓ All translations exist!\n";
}
?>