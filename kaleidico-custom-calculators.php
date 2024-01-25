<?php
/*
Plugin Name: Kaleidico Custom Calculators
Description: This is a plugin containing mortgage calculators for Kaleidico
Version: 1.0.0
Author: Angelo Marasa
Author URI: https://github.com/angelo-marasa
*/

// Updated
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
    wp_enqueue_script('kaleidico-custom-calculators-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'kaleidico_custom_calculators_enqueue_scripts');

function kaleidico_custom_calculators_add_menu()
{
    add_menu_page('Kaleidico Custom Calculators Options', 'Kaleidico Custom Calculators', 'manage_options', 'kaleidico-custom-calculators', 'kaleidico_custom_calculators_options_page');
}

function kaleidico_custom_calculators_options_page()
{
    echo '<h1>Kaleidico Custom Calculators Options</h1>';
}

add_action('admin_menu', 'kaleidico_custom_calculators_add_menu');

// Add the filter to add a link to the options page
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_plugin_page_settings_link');

// Function to add the "Settings" link
function add_plugin_page_settings_link($links)
{
    $settings_link = '<a href="admin.php?page=kaleidico-custom-calculators">' . __('Settings') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}
