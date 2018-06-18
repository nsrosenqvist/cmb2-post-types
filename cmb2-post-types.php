<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
Plugin Name: CMB2 Post Types
Description: A multi-check field type for CMB2
Version: 1.0.0
Author: Niklas Rosenqvist
Author URI: https://www.nsrosenqvist.com/
*/

if (! class_exists('CMB2_PostTypes')) {
    class CMB2_PostTypes
    {
        static function init()
        {
            if (! class_exists('CMB2')) {
                return;
            }

            // Include files
            require_once __DIR__ .'/src/Integration.php';

            // Initalize plugin
            \NSRosenqvist\CMB2\PostTypesField\Integration::init();
        }
    }
}
add_action('init', [CMB2_PostTypes::class, 'init']);
