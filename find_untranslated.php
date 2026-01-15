<?php
/**
 * Script to find untranslated Arabic phrases
 * Identifies phrases that are identical in English and Arabic (likely untranslated)
 */

// Load JSON files
$english_file = 'languages/english.json';
$arabic_file = 'languages/arabic.json';

$english_content = file_get_contents($english_file);
$arabic_content = file_get_contents($arabic_file);

$english_json = json_decode($english_content, true);
$arabic_json = json_decode($arabic_content, true);

echo "=== البحث عن العبارات غير المترجمة ===\n";
echo "=== Finding Untranslated Phrases ===\n\n";

$untranslated = [];
$potentially_untranslated = [];

foreach ($english_json as $key => $english_value) {
    if (isset($arabic_json[$key])) {
        $arabic_value = $arabic_json[$key];

        // Skip null/empty values
        if ($arabic_value === null || $arabic_value === "" || $arabic_value === " ") {
            continue;
        }

        // Check if Arabic value is identical to English value
        if ($english_value === $arabic_value) {
            $untranslated[$key] = $english_value;
        }

        // Check for common patterns that suggest untranslated content
        // Phrases that start with English words but might have some Arabic characters
        elseif (preg_match('/^[a-zA-Z]/', $arabic_value) && strlen($arabic_value) > 3) {
            // If it starts with English letters and is reasonably long, might be untranslated
            $potentially_untranslated[$key] = [
                'english' => $english_value,
                'arabic' => $arabic_value
            ];
        }
    }
}

echo "العبارات الغير مترجمة تماماً (Identical in both languages):\n";
echo "Completely untranslated phrases:\n";
echo "Count: " . count($untranslated) . "\n\n";

if (count($untranslated) > 0) {
    foreach ($untranslated as $key => $value) {
        echo "  '$key': '$value'\n";
    }
} else {
    echo "  ✓ لا توجد عبارات غير مترجمة تماماً\n";
    echo "  ✓ No completely untranslated phrases found\n";
}

echo "\n" . str_repeat("=", 50) . "\n\n";

echo "عبارات قد تكون غير مترجمة (May be untranslated):\n";
echo "Potentially untranslated phrases:\n";
echo "Count: " . count($potentially_untranslated) . "\n\n";

if (count($potentially_untranslated) > 0) {
    foreach ($potentially_untranslated as $key => $data) {
        echo "  '$key':\n";
        echo "    English: '{$data['english']}'\n";
        echo "    Arabic:  '{$data['arabic']}'\n";
        echo "\n";
    }
} else {
    echo "  ✓ لا توجد عبارات مشتبه بها\n";
    echo "  ✓ No potentially untranslated phrases found\n";
}

echo "\n=== ملخص ===\n";
echo "=== Summary ===\n\n";
echo "العبارات الغير مترجمة تماماً: " . count($untranslated) . "\n";
echo "العبارات المشتبه بها: " . count($potentially_untranslated) . "\n";
echo "Completely untranslated: " . count($untranslated) . "\n";
echo "Potentially untranslated: " . count($potentially_untranslated) . "\n";

if (count($untranslated) > 0 || count($potentially_untranslated) > 0) {
    echo "\n📝 تحتاج إلى الترجمة:\n";
    echo "\n📝 Needs translation:\n";
} else {
    echo "\n✅ جميع العبارات مترجمة!\n";
    echo "\n✅ All phrases are translated!\n";
}
?>