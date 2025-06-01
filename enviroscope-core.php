<?php
/**
 * Plugin Name: EnviroScope
 * Description: Environment sniffer plugin for WordPress.
 * Version: 1.0.0
 * Author: Lightning Gear
 */

if (!defined('ABSPATH')) exit;

// ✅ Show PHP version check notice
add_action('admin_notices', 'enviroscope_environment_notice');

function enviroscope_environment_notice() {
    $php_version = phpversion();
    if (version_compare($php_version, '7.4', '<')) {
        echo '<div class="notice notice-error"><p>⚠️ Enviroscope Warning: Your PHP version is ' . esc_html($php_version) . '. We recommend 7.4 or higher.</p></div>';
    } else {
        echo '<div class="notice notice-success"><p>✅ Enviroscope: PHP version is ' . esc_html($php_version) . ' — all good!</p></div>';
    }
}

// ✅ Load the core
require_once plugin_dir_path(__FILE__) . 'includes/enviroscope-core.php';

// ✅ Admin menu hook
add_action('admin_menu', 'enviroscope_register_admin_menu');

function enviroscope_register_admin_menu() {
    add_menu_page(
        'EnviroScope Settings',
        'EnviroScope',
        'manage_options',
        'enviroscope-settings',
        'enviroscope_settings_page',
        'dashicons-admin-site-alt3',
        100
    );
}

// ✅ Admin Page UI
function enviroscope_settings_page() {
    ?>
    <div class="wrap">
        <h1>EnviroScope - Environment Sniffer</h1>
        <p><strong>Detected Environment:</strong> <?php echo esc_html(enviroscope_get_environment()); ?></p>

        <form method="post" action="">
            <?php submit_button('Scan Again', 'primary', 'scan_enviro'); ?>
        </form>

        <?php
        if (isset($_POST['scan_enviro'])) {
            echo '<div class="updated"><p><strong>Scan completed:</strong> Environment re-detected as <code>' . esc_html(enviroscope_get_environment()) . '</code>.</p></div>';
        }
        ?>

        <hr>
        <h2>Upgrade to EnviroScope Pro</h2>
        <p>Want more features like advanced analytics, email alerts, and debug mode? Upgrade now!</p>
        <a href="https://yourdomain.com/pro-version" class="button button-secondary" target="_blank">Go Pro</a>

        <hr>
        <h2>Plugin Updates</h2>
        <p>This plugin checks for updates regularly. Click the button below to manually check:</p>
        <form method="post">
            <?php submit_button('Check for Updates', 'secondary', 'check_update'); ?>
        </form>
        <?php
        if (isset($_POST['check_update'])) {
            echo '<div class="updated"><p>No new updates found. (Placeholder)</p></div>';
        }
        ?>
    </div>
    <?php
}
