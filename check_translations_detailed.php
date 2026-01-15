<?php
/**
 * Detailed script to check and identify missing Arabic translations
 */

// Load JSON files
$english_file = 'languages/english.json';
$arabic_file = 'languages/arabic.json';

$english_content = file_get_contents($english_file);
$arabic_content = file_get_contents($arabic_file);

$english_json = json_decode($english_content, true);
$arabic_json = json_decode($arabic_content, true);

echo "=== فحص مفصل للترجمات العربية ===\n";
echo "=== Detailed Arabic Translations Check ===\n\n";

$empty_values = [];
$null_values = [];

foreach ($english_json as $key => $english_value) {
    if (isset($arabic_json[$key])) {
        $arabic_value = $arabic_json[$key];
        if ($arabic_value === null) {
            $null_values[$key] = $english_value;
        } elseif ($arabic_value === "" || $arabic_value === " ") {
            $empty_values[$key] = $english_value;
        }
    }
}

// Check for empty keys
foreach ($english_json as $key => $value) {
    if (empty($key) || $key === "") {
        echo "Empty key found in English JSON: '$key' => '$value'\n";
    }
}

foreach ($arabic_json as $key => $value) {
    if (empty($key) || $key === "") {
        echo "Empty key found in Arabic JSON: '$key' => '$value'\n";
    }
}

echo "\nNull values in Arabic (should be translated):\n";
foreach ($null_values as $key => $value) {
    echo "  '$key': '$value'\n";
}

echo "\nEmpty values in Arabic (should be translated):\n";
foreach ($empty_values as $key => $value) {
    echo "  '$key': '$value'\n";
}

echo "\nTotal null values: " . count($null_values) . "\n";
echo "Total empty values: " . count($empty_values) . "\n";

if (count($null_values) == 0 && count($empty_values) == 0) {
    echo "\n✓ جميع الترجمات مكتملة!\n";
} else {
    echo "\nتحتاج هذه الترجمات إلى الإكمال:\n";
    echo "These translations need to be completed:\n";
}
?>