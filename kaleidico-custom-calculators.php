<?php
/*
Plugin Name: Kaleidico Custom Calculators
Description: This is a plugin containing mortgage calculators for Kaleidico
Version: 2.5.0
Author: Angelo Marasa
Author URI: https://github.com/angelo-marasa
*/

// Shortcodes
require 'calculators/fha/shortcode.php';
require 'calculators/mortgage-payment/shortcode.php';
require 'calculators/affordability/shortcode.php';
require 'calculators/dscr/shortcode.php';
require 'calculators/heloc/shortcode.php';

// Updater
require 'puc/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/kaleidico/kaleidico-custom-calculators',
    __FILE__,
    'kaleidico-custom-calculators'
);

// Set the branch that contains the stable release.
// $myUpdateChecker->setBranch('stable-branch-name');

// Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('your-token-here');

/* -------------------------------------------------------------------------------------- */

function kaleidico_custom_calculators_enqueue_scripts()
{
    global $post;

    // Enqueue the styles, which might be needed across all pages
    wp_enqueue_style('kaleidico-custom-calculators-style', plugin_dir_url(__FILE__) . 'src/css/kaleidico-custom-calculators.css');

    // Conditionally enqueue scripts based on the presence of shortcodes
    if (has_shortcode($post->post_content, 'fha_calculator')) {
        wp_enqueue_script('kaleidico-custom-calculators-fha-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-fha.js', array('jquery'), '', true);
    }

    if (has_shortcode($post->post_content, 'mortgage-payment-calculator')) {
        wp_enqueue_script('kaleidico-custom-calculators-mortgage-payment-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-mortgage-payment.js', array('jquery'), '', true);
    }

    if (has_shortcode($post->post_content, 'dscr-calculator')) {
        wp_enqueue_script('kaleidico-custom-calculators-dscr-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-dscr.js', array('jquery'), '', true);
    }

    if (has_shortcode($post->post_content, 'affordability_calculator')) {
        wp_enqueue_script('kaleidico-custom-calculators-affordability-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-affordability.js', array('jquery'), '', true);
    }


    if (has_shortcode($post->post_content, 'heloc_calculator')) {
        wp_enqueue_script('kaleidico-custom-calculators-heloc-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-heloc.js', array('jquery'), '', true);

        // Enqueue Chart.js from CDN
        wp_enqueue_script(
            'chart-js',
            'https://cdn.jsdelivr.net/npm/chart.js',
            array(),
            null,
            true
        );
    }

    // Enqueue UI scripts which might be needed across all calculator pages
    if (has_shortcode($post->post_content, 'fha_calculator') || has_shortcode($post->post_content, 'heloc_calculator') || has_shortcode($post->post_content, 'dscr-calculator') || has_shortcode($post->post_content, 'mortgage-payment-calculator') || has_shortcode($post->post_content, 'affordability_calculator')) {
        wp_enqueue_script('kaleidico-custom-calculators-ui-script', plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-ui.js', array('jquery'), '', true);
    }
}
add_action('wp_enqueue_scripts', 'kaleidico_custom_calculators_enqueue_scripts');

function add_plugin_page_settings_link($links)
{
    $settings_link = '<a href="admin.php?page=kaleidico-custom-calculators">' . __('Settings') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_plugin_page_settings_link');
