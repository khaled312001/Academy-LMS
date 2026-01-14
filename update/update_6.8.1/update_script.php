<?php
$CI = get_instance();
$CI->load->database();
$CI->load->dbforge();

// Add Column sub_category_thumbnail 
$upcoming_image_thumbnail = array(
    'upcoming_image_thumbnail' => array(
        'type' => 'varchar',
        'constraint' => 255,
        'default' => NULL,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    )
);
$CI->dbforge->add_column('course', $upcoming_image_thumbnail);

// update VERSION NUMBER INSIDE SETTINGS TABLE
$settings_data = array('value' => '6.8.1');
$CI->db->where('key', 'version');
$CI->db->update('settings', $settings_data);