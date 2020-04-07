<?php
namespace Inc;

use Inc\Admin\AdminPages;
use Inc\CustomAction;
use Inc\EnqueueScript;
use Inc\Query\GuestQuery;
use Inc\Registers\RegisterAction;
use Inc\Registers\RegisterCustomize;
use Inc\Widgets\Init as InitWidget;

final class Init
{
    public function __construct()
    {
        if (method_exists($this, 'initDefine'))
            $this->initDefine();
        if (method_exists($this, 'addSupportTheme'))
            $this::addSupportTheme();
        if (method_exists($this, 'registerClass'))
            $this::registerClass();
        if (method_exists($this, 'hookAdmin'))
            $this->hookAdmin();
    }

    public function hookAdmin()
    {
        if(is_admin()) {
            // do something
        } else {
            add_action( 'init', array($this, 'disableScriptWP'));
        }
    }

    /**
     * @return array
     * get class
     * service theme array multiple
     * sometime class new file
     */
    public static function getService()
    {
        return [
            RegisterAction::class,
            RegisterCustomize::class,
            // RegisterMetabox::class,
            GuestQuery::class,
            AdminPages::class,
            InitWidget::class,
            EnqueueScript::class
        ];
    }

    public function initDefine()
    {
        define('TEXT_DOMAIN_THEME', 'vihas_theme');
    }

    public static function addSupportTheme()
    {
        add_theme_support('post-thumbnails');
        add_image_size('single-post-thumbnail', 590, 180);
    }

    public function initPluginBlade()
    {
        return \Inc\Plugins::blade();
    }

    public static function getPostThumbnail()
    {
        return CustomAction::getPostThumbnail();
    }

    /**
     * @return CustomAction
     */
    public static function getCustomLogo()
    {
        return CustomAction::getCustomLogo();
    }

    /**
     * @return object
     */
    public static function initClass($class)
    {
        if (class_exists($class)) :
            return new $class();
        endif;
    }

    /**
     * @return service
     * description: instance multiple class
     */
    public static function registerClass()
    {
        foreach (self::getService() as $class) {
            self::initClass($class);
        }
    }

    public function disableScriptWP()
    {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'wp_generator' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        // Remove from TinyMCE
        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }
}
