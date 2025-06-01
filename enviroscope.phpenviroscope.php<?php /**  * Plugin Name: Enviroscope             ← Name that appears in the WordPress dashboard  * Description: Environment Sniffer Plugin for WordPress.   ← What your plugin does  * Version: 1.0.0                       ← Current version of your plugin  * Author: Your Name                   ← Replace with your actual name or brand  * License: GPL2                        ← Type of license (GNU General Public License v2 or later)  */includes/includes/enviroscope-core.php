<?php
/**
 * Plugin Name: Enviroscope
 * Description: Environment Sniffer Plugin for WordPress.
 * Version: 1.0.0
 * Author: LightningGear-Business
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: enviroscope
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Core plugin files
require_once plugin_dir_path(__FILE__) . 'includes/enviroscope-core.php';
require_once plugin_dir_path(__FILE__) . 'admin/enviroscope-admin.php';
// require_once plugin_dir_path(__FILE__) . 'public/enviroscope-public.php'; // Uncomment if needed

// Activation/Deactivation
register_activation_hook(__FILE__, 'enviroscope_activate');
register_deactivation_hook(__FILE__, 'enviroscope_deactivate');

function enviroscope_activate() {
    // Setup tasks
}

function enviroscope_deactivate() {
    // Cleanup tasks
}
