<?php
/*
Plugin Name: Kaleidico Custom Calculators
Description: This is a plugin containing mortgage calculators for Kaleidico
Version: 1.3.0
Author: Angelo Marasa
Author URI: https://github.com/angelo-marasa
*/

// Shortcodes
require 'calculators/fha/shortcode.php';

// Updater
require 'puc/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/kaleidico/kaleidico-custom-calculators',
    __FILE__,
    'kaleidico-custom-calculators'
);

//Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');

//Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('your-token-here');

/* -------------------------------------------------------------------------------------- */


function kaleidico_custom_calculators_enqueue_scripts()
{
    wp_enqueue_style('kaleidico-custom-calculators-style', plugin_dir_url(__FILE__) . 'src/css/kaleidico-custom-calculators.css');
    wp_enqueue_script('kaleidico-custom-calculators-fha-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-fha.js', array('jquery'), '', true);
    wp_enqueue_script('kaleidico-custom-calculators-ui-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-ui.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'kaleidico_custom_calculators_enqueue_scripts');


function add_plugin_page_settings_link($links)
{
    $settings_link = '<a href="admin.php?page=kaleidico-custom-calculators">' . __('Settings') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_plugin_page_settings_link');
