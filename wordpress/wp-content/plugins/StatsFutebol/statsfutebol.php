<?php
/*
Plugin Name: StatsFutebol
Version: 1.0
Author: Ricardo Nunes
*/

if (!defined('ABSPATH')) {
    exit; 
}
define('STATSFUTEBOL_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MEU_PLUGIN_DIR', plugin_dir_path(__FILE__));
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
require_once MEU_PLUGIN_DIR . 'includes/functions.php';
require_once MEU_PLUGIN_DIR . 'includes/shortcodes.php';

