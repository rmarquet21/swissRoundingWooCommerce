<?php
/*
Plugin Name: remiseCentimes
Description: Remise pour les centimes Suisse
Author: Robin Marquet
Author URI: 
Version: 1.0.0
Text Domain: remiseCentimes
*/

if (!defined('ABSPATH')) {
    exit();
}

if (!defined('SWISS_ROUNDING_FILE')) {
    define('SWISS_ROUNDING_FILE', __FILE__);
}

require_once plugin_dir_path(__FILE__) . 'includes/class-swiss-5-cent-rounding.php';

/**
 * Instancier la classe principale 
 */
if (class_exists('Swiss_Rounding')) {
    Swiss_Rounding::instance();
}