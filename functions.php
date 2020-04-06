<?php
require_once get_template_directory() . '/vendor/autoload.php';

use Inc\Init;
use Inc\CustomAction;
use Inc\Plugins;

if (!function_exists('initTheme')):
    function initTheme() {
        return new Init;
    }
    add_action( 'after_setup_theme', 'initTheme' );
endif;

if (!function_exists('blade')):
    function view($view, $params = array()) {
        return Plugins::blade()->run($view, $params);
    }
endif;


if (!function_exists('getPostThumbnail')):
    function getPostThumbnail() {
        return CustomAction::getPostThumbnail();
    }
endif;

if (!function_exists('getCustomLogo')):
    function getCustomLogo() {
        return CustomAction::getCustomLogo();
    }
endif;

if (!function_exists('get_post_image_url')) :
    function get_post_image_url(){
        if (get_the_post_thumbnail_url()) {
            return get_the_post_thumbnail_url();
        }
        return bloginfo('template_url').'/assets/images/logo.png';
    }
endif;