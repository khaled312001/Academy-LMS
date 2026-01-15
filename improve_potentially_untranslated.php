<?php
/**
 * Script to improve potentially untranslated Arabic phrases
 */

// Load the Arabic JSON file
$arabic_file = 'languages/arabic.json';
$arabic_content = file_get_contents($arabic_file);
$arabic_json = json_decode($arabic_content, true);

echo "=== تحسين العبارات المشتبه بها ===\n";
echo "=== Improving Potentially Untranslated Phrases ===\n\n";

// Potentially untranslated phrases that need improvement
$improvements = [
    'adobe_illustrator_cc_-_essentials_training_course' => 'أدوبي إليستريتور CC - دورة تدريبية في الأساسيات',
    'after_effects_cc_2019:_complete_course' => 'أفتر إفكتس CC 2019: دورة كاملة'
];

$updated_count = 0;

foreach ($improvements as $key => $improved_translation) {
    if (isset($arabic_json[$key])) {
        $current_value = $arabic_json[$key];
        if ($current_value !== $improved_translation) {
            $arabic_json[$key] = $improved_translation;
            $updated_count++;
            echo "✓ Improved: '$key'\n";
            echo "  From: '$current_value'\n";
            echo "  To: '$improved_translation'\n\n";
        } else {
            echo "✓ Already correct: '$key' => '$improved_translation'\n\n";
        }
    } else {
        echo "⚠ Key not found: '$key'\n\n";
    }
}

echo "تم تحسين: $updated_count عبارة\n";
echo "Improved: $updated_count phrases\n\n";

// Save the updated Arabic JSON file
$json_output = json_encode($arabic_json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
if (file_put_contents($arabic_file, $json_output)) {
    echo "✓ تم حفظ ملف اللغة العربية المحدث\n";
    echo "✓ Arabic language file has been saved\n\n";
} else {
    echo "✗ خطأ في حفظ الملف\n";
    echo "✗ Error saving file\n\n";
}

echo "=== التحقق النهائي ===\n";
echo "=== Final Verification ===\n\n";

// Run the untranslated check again to verify
$english_file = 'languages/english.json';
$english_content = file_get_contents($english_file);
$english_json = json_decode($english_content, true);

$still_untranslated = [];
foreach ($english_json as $key => $english_value) {
    if (isset($arabic_json[$key])) {
        $arabic_value = $arabic_json[$key];
        if ($english_value === $arabic_value && !empty($arabic_value)) {
            $still_untranslated[$key] = $english_value;
        }
    }
}

if (count($still_untranslated) > 0) {
    echo "العبارات المتبقية غير المترجمة:\n";
    echo "Remaining untranslated phrases:\n";
    foreach ($still_untranslated as $key => $value) {
        echo "  '$key': '$value'\n";
    }
} else {
    echo "✅ جميع العبارات مترجمة الآن!\n";
    echo "✅ All phrases are now translated!\n";
}
?>