<?php
/**
 * Script to translate the remaining untranslated Arabic phrases
 */

// Load the Arabic JSON file
$arabic_file = 'languages/arabic.json';
$arabic_content = file_get_contents($arabic_file);
$arabic_json = json_decode($arabic_content, true);

echo "=== ترجمة العبارات غير المترجمة ===\n";
echo "=== Translating Untranslated Phrases ===\n\n";

// Completely untranslated phrases (identical in both languages)
$translations = [
    'stay_tuned!' => 'ترقبوا!',
    'notifications_about_your_activity_will_show_up_here.' => 'ستظهر هنا الإشعارات المتعلقة بنشاطك.',
    'explore,_learn,_and_grow_with_us._enjoy_a_seamless_and_enriching_educational_journey._lets_begin!' => 'استكشف، تعلم، وانمو معنا. استمتع برحلة تعليمية سلسة ومثرية. دعنا نبدأ!',
    'forgot_password?' => 'نسيت كلمة المرور؟',
    'don`t_have_an_account?' => 'ليس لديك حساب؟',
    'recaptcha_sitekey' => 'مفتاح موقع recaptcha',
    'recaptcha_secretkey' => 'المفتاح السري لـ recaptcha',
    'html5' => 'HTML5',
    'h5p' => 'H5P',
    'paystack' => 'Paystack',
    'paytm' => 'Paytm',
    '.vtt' => '.vtt',
    'iframe' => 'إطار iframe'
];

$updated_count = 0;

foreach ($translations as $key => $arabic_translation) {
    if (isset($arabic_json[$key])) {
        $current_value = $arabic_json[$key];
        if ($current_value !== $arabic_translation) {
            $arabic_json[$key] = $arabic_translation;
            $updated_count++;
            echo "✓ Translated: '$key'\n";
            echo "  From: '$current_value'\n";
            echo "  To: '$arabic_translation'\n\n";
        } else {
            echo "✓ Already translated: '$key' => '$arabic_translation'\n\n";
        }
    } else {
        echo "⚠ Key not found: '$key'\n\n";
    }
}

echo "تم تحديث: $updated_count عبارة\n";
echo "Updated: $updated_count phrases\n\n";

// Save the updated Arabic JSON file
$json_output = json_encode($arabic_json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
if (file_put_contents($arabic_file, $json_output)) {
    echo "✓ تم حفظ ملف اللغة العربية المحدث\n";
    echo "✓ Arabic language file has been saved\n\n";
} else {
    echo "✗ خطأ في حفظ الملف\n";
    echo "✗ Error saving file\n\n";
}

echo "=== الملخص ===\n";
echo "=== Summary ===\n\n";
echo "العبارات المترجمة: $updated_count\n";
echo "Translated phrases: $updated_count\n";

// Check for the potentially untranslated phrases
echo "\n=== العبارات المشتبه بها (تحتاج مراجعة) ===\n";
echo "=== Potentially untranslated phrases (needs review) ===\n\n";

$potentially_untranslated = [
    'adobe_illustrator_cc_-_essentials_training_course' => [
        'current' => 'Adobe Illustrator CC - دورة تدريبية في الأساسيات',
        'suggested' => 'أدوبي إليستريتور CC - دورة تدريبية في الأساسيات'
    ],
    'after_effects_cc_2019:_complete_course' => [
        'current' => 'After Effects CC 2019: دورة كاملة',
        'suggested' => 'أفتر إفكتس CC 2019: دورة كاملة'
    ]
];

foreach ($potentially_untranslated as $key => $data) {
    echo "العبارة: '$key'\n";
    echo "الحالي: '{$data['current']}'\n";
    echo "مقترح: '{$data['suggested']}'\n\n";
}
?>