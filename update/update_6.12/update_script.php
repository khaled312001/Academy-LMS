<?php
$CI = get_instance();
$CI->load->database();
$CI->load->dbforge();

// CREATING SEO FIELDS TABLE
$field = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'route' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'url' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'is_addon' => array(
        'type' => 'INT',
        'constraint' => '11',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'meta_title' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'meta_keywords' => array(
        'type' => 'TEXT',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'meta_description' => array(
        'type' => 'TEXT',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'meta_robot' => array(
        'type' => 'TEXT',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'canonical_url' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'custom_url' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'og_title' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'og_description' => array(
        'type' => 'TEXT',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'og_image' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'json_ld' => array(
        'type' => 'LONGTEXT',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    )
);

$CI->dbforge->add_field($field);
$CI->dbforge->add_key('id', TRUE);
$attributes = array('collation' => "utf8_unicode_ci");
$CI->dbforge->create_table('seo_fields', TRUE);

$data = [
    ['id' => 1, 'route' => 'home', 'url' => 'home', 'is_addon' => NULL, 'meta_title' => 'Home page', 'meta_keywords' => NULL, 'meta_description' => 'Home page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy', 'custom_url' => 'https://demo.creativeitem.com/academy', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 2, 'route' => 'courses', 'url' => 'home/courses', 'is_addon' => NULL, 'meta_title' => 'Course page', 'meta_keywords' => NULL, 'meta_description' => 'Course page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/home/courses', 'custom_url' => 'https://demo.creativeitem.com/academy/home/courses', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 3, 'route' => 'login', 'url' => 'login', 'is_addon' => NULL, 'meta_title' => 'Login page', 'meta_keywords' => NULL, 'meta_description' => 'Login page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/login', 'custom_url' => 'https://demo.creativeitem.com/academy/login', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 4, 'route' => 'sign_up', 'url' => 'sign_up', 'is_addon' => NULL, 'meta_title' => 'Signup page', 'meta_keywords' => NULL, 'meta_description' => 'Signup page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/sign_up', 'custom_url' => 'https://demo.creativeitem.com/academy/sign_up', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 5, 'route' => 'blog', 'url' => 'blog', 'is_addon' => NULL, 'meta_title' => 'Blog page', 'meta_keywords' => NULL, 'meta_description' => 'Blog page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/blog', 'custom_url' => 'https://demo.creativeitem.com/academy/blog', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 6, 'route' => 'contact_us', 'url' => 'home/contact_us', 'is_addon' => NULL, 'meta_title' => 'Contact us page', 'meta_keywords' => NULL, 'meta_description' => 'Contact us page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/home/contact_us', 'custom_url' => 'https://demo.creativeitem.com/academy/home/contact_us', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 7, 'route' => 'about_us', 'url' => 'home/about_us', 'is_addon' => NULL, 'meta_title' => 'About us page', 'meta_keywords' => NULL, 'meta_description' => 'About us page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/home/about_us', 'custom_url' => 'https://demo.creativeitem.com/academy/home/about_us', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 8, 'route' => 'privacy_policy', 'url' => 'home/privacy_policy', 'is_addon' => NULL, 'meta_title' => 'Privacy policy page', 'meta_keywords' => NULL, 'meta_description' => 'Privacy policy page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/home/privacy_policy', 'custom_url' => 'https://demo.creativeitem.com/academy/home/privacy_policy', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 9, 'route' => 'terms_and_condition', 'url' => 'home/terms_and_condition', 'is_addon' => NULL, 'meta_title' => 'Terms and condition page', 'meta_keywords' => NULL, 'meta_description' => 'Terms and condition page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/home/terms_and_condition', 'custom_url' => 'https://demo.creativeitem.com/academy/home/terms_and_condition', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 10, 'route' => 'refund_policy', 'url' => 'home/refund_policy', 'is_addon' => NULL, 'meta_title' => 'Refund policy page', 'meta_keywords' => NULL, 'meta_description' => 'Refund policy page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/home/refund_policy', 'custom_url' => 'https://demo.creativeitem.com/academy/home/refund_policy', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 11, 'route' => 'faq', 'url' => 'home/faq', 'is_addon' => NULL, 'meta_title' => 'Faq page', 'meta_keywords' => NULL, 'meta_description' => 'Faq page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/home/faq', 'custom_url' => 'https://demo.creativeitem.com/academy/home/faq', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 12, 'route' => 'ebook', 'url' => 'ebook', 'is_addon' => 1, 'meta_title' => 'Ebook page', 'meta_keywords' => NULL, 'meta_description' => 'Ebook page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/ebook', 'custom_url' => 'https://demo.creativeitem.com/academy/ebook', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 13, 'route' => 'course_bundles', 'url' => 'course_bundles', 'is_addon' => 1, 'meta_title' => 'Course bundle page', 'meta_keywords' => NULL, 'meta_description' => 'Course bundle page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/course_bundles', 'custom_url' => 'https://demo.creativeitem.com/academy/course_bundles', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
    ['id' => 14, 'route' => 'bootcamps', 'url' => 'addons/bootcamp/bootcamp_list', 'is_addon' => 1, 'meta_title' => 'Bootcamps page', 'meta_keywords' => NULL, 'meta_description' => 'Bootcamps page for academy Seo', 'meta_robot' => 'Meta robot', 'canonical_url' => 'https://demo.creativeitem.com/academy/addons/bootcamp/bootcamp_list', 'custom_url' => 'https://demo.creativeitem.com/academy/addons/bootcamp/bootcamp_list', 'og_title' => 'Og title', 'og_description' => 'Og description', 'og_image' => NULL, 'json_ld' => '{ "@context": "http://schema.org", "@type": "WebSite", "name": "CodeCanyon", "url": "https://codecanyon.net" }'],
];

$CI->db->insert_batch('seo_fields', $data);

// INSERT SITEMAP XML INSIDE SETTINGS TABLE
$settings_data = array('value' => '[ "login", "sign_up", "login/forgot_password_request", "blog", "home/courses", "home/contact_us", "home/about_us", "home/privacy_policy", "home/terms_and_condition", "home/faq", "home/refund_policy" ]');

$settings_data['key'] = 'sitemap_xml';
$CI->db->insert('settings', $settings_data);

// UPDATE VERSION NUMBER INSIDE SETTINGS TABLE
$settings_data = array('value' => '6.12');
$CI->db->where('key', 'version');
$CI->db->update('settings', $settings_data);
