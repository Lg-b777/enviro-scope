<?php
// Core Environment Sniffer Logic

add_action('admin_notices', 'enviroscope_environment_notice');

function enviroscope_environment_notice() {
    $php_version = phpversion();
    if (version_compare($php_version, '7.4', '<')) {
        echo '<div class="notice notice-error"><p>⚠️ Enviroscope Warning: Your PHP version is ' . esc_html($php_version) . '. We recommend 7.4 or higher.</p></div>';
    } else {
        echo '<div class="notice notice-success"><p>✅ Enviroscope: PHP version is ' . esc_html($php_version) . ' — all good!</p></div>';
    }
}
