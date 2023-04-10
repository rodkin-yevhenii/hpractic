<?php

/**
 * Plugin Name:       Gutenberg Blocks
 * Description:       Custom gutenberg blocks to work with House Practice.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.4
 * Author:            Yevhenii Rodkin
 * Author URI:        https://github.com/rodkin-yevhenii
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hpractice-gb
 * Domain Path:       /languages
 */

$composer_path = __DIR__ . '/vendor/autoload.php';
clearstatcache();
if (file_exists($composer_path)) {
    require_once($composer_path);
} else {
    wp_die(__("GB Plugin: Php composer is required", 'hpractice-gb'));
}

if (!defined('GB_PLUGIN_URI')) {
    define('GB_PLUGIN_URI', plugins_url(basename(__DIR__)));
}

if (!defined('GB_PLUGIN_DIR')) {
    define('GB_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

function customBlockRegister()
{
    wp_register_style(
        'gb-editor-style',
        GB_PLUGIN_URI . '/dist/css/editor.css',
        ['wp-edit-blocks']
    );
//    wp_enqueue_style('gb-editor-style');

    wp_register_script(
        'gb-editor-script',
        GB_PLUGIN_URI . '/dist/js/editor.js',
        [
            'wp-blocks',
        ]
    );

    register_block_type(
        'gutenberg-blocks/section',
        [
            'editor_script' => 'gb-editor-script',
            'editor_style' => 'gb-editor-style',
        ]
    );
}
add_action('init', 'customBlockRegister');

//add_action('enqueue_block_editor_assets', 'gutenberg_block_editor_scripts');
function gutenberg_block_editor_scripts()
{
    wp_register_script(
        'gb-editor-script',
        GB_PLUGIN_URI . '/dist/js/editor.js',
        [
            'wp-blocks',
            'wp-i18n',
            'wp-element',
            'wp-editor',
            'wp-components',
            'wp-blob',
            'lodash',
            'wp-data',
            'wp-html-entities',
            'wp-compose',
        ]
    );
    wp_enqueue_script('gb-editor-script');
}
