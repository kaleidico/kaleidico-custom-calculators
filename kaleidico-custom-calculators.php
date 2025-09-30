<?php
/*
Plugin Name: Kaleidico Custom Calculators
Description: This is a plugin containing mortgage calculators for Kaleidico.
Version: 2.91
Author: Angelo Marasa
Author URI: https://github.com/angelo-marasa
*/

// ------------------------------------------------------------------------------
// Updater Integration (GitHub-based) - DISABLED
// ------------------------------------------------------------------------------
// require 'puc/plugin-update-checker.php';

// use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// $myUpdateChecker = PucFactory::buildUpdateChecker(
//     'https://github.com/kaleidico/kaleidico-custom-calculators',
//     __FILE__,
//     'kaleidico-custom-calculators'
// );

// // Add GitHub authentication for private repositories
// // You can either use a personal access token or set authentication via environment variable
// // Option 1: Personal Access Token (create one at https://github.com/settings/tokens)
// // $myUpdateChecker->setAuthentication('your-github-token-here');

// // Option 2: Get token from environment variable or WordPress option
// $github_token = get_option('github_access_token', '') ?: getenv('GITHUB_ACCESS_TOKEN');
// if (!empty($github_token)) {
//     $myUpdateChecker->setAuthentication($github_token);
// }
// Cleanup legacy license data
function kaleidico_custom_calculators_cleanup_legacy_license_data()
{
    // Remove any leftover license-related options
    delete_option('kaleidico_custom_calculators_license_key');
    delete_transient('kaleidico_custom_calculators_license_valid');
}
register_activation_hook(__FILE__, 'kaleidico_custom_calculators_cleanup_legacy_license_data');

defined('ABSPATH') || exit;

// ------------------------------------------------------------------------------
// Plugin Functionality (Calculators) - Always Loaded
// ------------------------------------------------------------------------------
require 'calculators/fha/shortcode.php';
require 'calculators/mortgage-payment/shortcode.php';
require 'calculators/affordability/shortcode.php';
require 'calculators/dscr/shortcode.php';
require 'calculators/heloc/shortcode.php';
require 'calculators/fix-and-flip/shortcode.php';
require 'calculators/rental-roi-calculator/shortcode.php';

// ------------------------------------------------------------------------------
// Enqueue Scripts & Styles
// ------------------------------------------------------------------------------
function kaleidico_custom_calculators_enqueue_scripts()
{
    global $post;

    wp_enqueue_style(
        'kaleidico-custom-calculators-style',
        plugin_dir_url(__FILE__) . 'src/css/kaleidico-custom-calculators.css'
    );

    if (empty($post->post_content)) {
        return;
    }

    // Individual calculators
    if (has_shortcode($post->post_content, 'fha_calculator')) {
        wp_enqueue_script(
            'kaleidico-custom-calculators-fha-script',
            plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-fha.js',
            ['jquery'],
            null,
            true
        );
    }
    if (has_shortcode($post->post_content, 'mortgage-payment-calculator')) {
        wp_enqueue_script(
            'kaleidico-custom-calculators-mortgage-payment-script',
            plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-mortgage-payment.js',
            ['jquery'],
            null,
            true
        );
    }
    if (has_shortcode($post->post_content, 'dscr-calculator')) {
        wp_enqueue_script(
            'kaleidico-custom-calculators-dscr-script',
            plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-dscr.js',
            ['jquery'],
            null,
            true
        );
        wp_enqueue_script(
            'kaleidico-custom-calculators-resizer',
            plugin_dir_url(__FILE__) . 'src/js/ResizeSensor.js',
            ['jquery'],
            null,
            true
        );
        wp_enqueue_script(
            'kaleidico-custom-calculators-element-queries',
            plugin_dir_url(__FILE__) . 'src/js/ElementQueries.js',
            ['jquery'],
            null,
            true
        );
    }
    if (has_shortcode($post->post_content, 'affordability_calculator')) {
        wp_enqueue_script(
            'kaleidico-custom-calculators-affordability-script',
            plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-affordability.js',
            ['jquery'],
            null,
            true
        );
    }
    if (has_shortcode($post->post_content, 'heloc_calculator')) {
        wp_enqueue_script(
            'kaleidico-custom-calculators-heloc-script',
            plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-heloc.js',
            ['jquery'],
            null,
            true
        );
        wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', [], null, true);
        wp_enqueue_script(
            'kaleidico-custom-calculators-resizer',
            plugin_dir_url(__FILE__) . 'src/js/ResizeSensor.js',
            ['jquery'],
            null,
            true
        );
        wp_enqueue_script(
            'kaleidico-custom-calculators-element-queries',
            plugin_dir_url(__FILE__) . 'src/js/ElementQueries.js',
            ['jquery'],
            null,
            true
        );
    }
    if (has_shortcode($post->post_content, 'fix-and-flip-calculator')) {
        wp_enqueue_script(
            'kaleidico-custom-calculators-fix-flip-script',
            plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-fix-and-flip.js',
            [],
            '1.0.4',
            true
        );
    }

    // Rental ROI
    if (has_shortcode($post->post_content, 'rental-roi-calculator')) {
        wp_enqueue_script(
            'kaleidico-custom-calculators-rental-roi-script',
            plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-rental-roi.js',
            ['jquery'],
            '1.0.0',
            true
        );
    }

    // Shared UI script if any calculator shortcode is present
    if (preg_match(
        '/\[(fha_calculator|heloc_calculator|dscr-calculator|mortgage-payment-calculator|' .
            'affordability_calculator|fix-and-flip-calculator|rental-roi-calculator)\b/',
        $post->post_content
    )) {
        wp_enqueue_script(
            'kaleidico-custom-calculators-ui-script',
            plugin_dir_url(__FILE__) . 'src/js/kaleidico-custom-calculators-ui.js',
            ['jquery'],
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'kaleidico_custom_calculators_enqueue_scripts');
