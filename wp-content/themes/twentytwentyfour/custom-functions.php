<?php
// custom-functions.php

// Add a menu item in the admin sidebar
function add_image_ai_menu() {
    add_menu_page(
        'Image AI Settings',      // Page title
        'Image AI Settings',      // Menu title
        'manage_options',         // Capability required to access
        'image_ai_settings',      // Menu slug
        'display_image_ai_page'   // Callback function to display the settings page
    );
}
add_action('admin_menu', 'add_image_ai_menu');

// Register settings and fields
function image_ai_settings_init() {
    // General Settings Section
    register_setting('image_ai_options', 'dall_e_api_key');
    add_settings_section('image_ai_general_section', 'General Settings', 'image_ai_general_section_callback', 'image_ai_settings');
    add_settings_field('dall_e_api_key', 'DALL-E API Key', 'dall_e_api_key_callback', 'image_ai_settings', 'image_ai_general_section');

    // DALL-E Settings Section
    register_setting('image_ai_options', 'image_size');
    register_setting('image_ai_options', 'image_theme');
    register_setting('image_ai_options', 'color_code');
    register_setting('image_ai_options', 'num_images');
    add_settings_section('image_ai_dalle_section', 'DALL-E Settings', 'image_ai_dalle_section_callback', 'image_ai_settings');
    add_settings_field('image_size', 'Image Size', 'image_size_callback', 'image_ai_settings', 'image_ai_dalle_section');
    add_settings_field('image_theme', 'Image Theme', 'image_theme_callback', 'image_ai_settings', 'image_ai_dalle_section');
    add_settings_field('color_code', 'Color Code', 'color_code_callback', 'image_ai_settings', 'image_ai_dalle_section');
    add_settings_field('num_images', 'Number of Images to Generate', 'num_images_callback', 'image_ai_settings', 'image_ai_dalle_section');
}
add_action('admin_init', 'image_ai_settings_init');

// Callback functions
function image_ai_general_section_callback() {
    echo '<p>Enter your DALL-E API key below:</p>';
}

function image_ai_dalle_section_callback() {
    echo '<p>Configure DALL-E settings below:</p>';
}

function dall_e_api_key_callback() {
    $dall_e_api_key = get_option('dall_e_api_key');
    echo '<input type="text" name="dall_e_api_key" value="' . esc_attr($dall_e_api_key) . '" />';
}

function image_size_callback() {
    $image_size = get_option('image_size');
    echo '<input type="text" name="image_size" value="' . esc_attr($image_size) . '" />';
}

function image_theme_callback() {
    $image_theme = get_option('image_theme');
    echo '<input type="text" name="image_theme" value="' . esc_attr($image_theme) . '" />';
}

function color_code_callback() {
    $color_code = get_option('color_code');
    echo '<input type="text" name="color_code" value="' . esc_attr($color_code) . '" />';
}

function num_images_callback() {
    $num_images = get_option('num_images');
    echo '<input type="text" name="num_images" value="' . esc_attr($num_images) . '" />';
}

// Callback function to display the settings page
function display_image_ai_page() {
    ?>
    <div class="wrap">
        

        <form method="post" action="options.php" id="image-ai-settings-form">
            <?php settings_fields('image_ai_options'); ?>
            <div id="general-settings" class="image-ai-tab-content">
                <?php do_settings_sections('image_ai_settings'); ?>
            </div>
            <div id="dalle-settings" class="image-ai-tab-content" style="display:none;">
                <?php do_settings_sections('image_ai_settings'); ?>
            </div>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

