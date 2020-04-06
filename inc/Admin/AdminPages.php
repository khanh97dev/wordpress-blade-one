<?php
namespace Inc\Admin;

class AdminPages {

    private static $basePath = 'Inc\Admin\AdminPages';
    private static $slugPage = 'theme-settings';
    private static $title    = 'vihas theme';
    /**
     *  2Start things up
     *
     * @since 1.0.0
     */
    public function __construct() {

        // We only need to register the admin panel on the back-end
        if (is_admin()) {
            if(method_exists($this,'add_admin_menu')){
                add_action('admin_menu', array($this, 'add_admin_menu'));
            }
            if(method_exists($this,'register_settings')){
                add_action('admin_init', array($this, 'register_settings'));
            }
        }
        add_action('admin_bar_menu', array($this, 'addAdminBar'), 1000);
    }
    /**
     * Returns all theme options
     *
     * @since 1.0.0
     */
    public static function get_theme_options() {
        return get_option('theme_options');
    }

    /**
     * Returns single theme option
     *
     * @since 1.0.0
     */
    public static function get_theme_option($type, $id) {
        $options = self::get_theme_options();
        if (isset($options[$type][$id])) {
            return $options[$type][$id];
        }
        return;
    }

    /**
     * Add sub menu page
     *
     * @since 1.0.0
     */
    public static function add_admin_menu() {
        $adminPage = add_menu_page(
            __('Page Title', TEXT_DOMAIN_THEME),
            __(self::$title, TEXT_DOMAIN_THEME),
            'manage_options',
            self::$slugPage, /* id menu menu */
            array(self::$basePath, 'create_admin_page')
        );
        add_action( "load-$adminPage", array(self::$basePath, 'add_scripts') );
    }

    public static function add_admin_submenu() {
        // add_submenu_page(
        //     'theme-settings',
        //     __('Page Title 2', TEXT_DOMAIN_THEME),
        //     __('Menu Title 2', TEXT_DOMAIN_THEME),
        //     'manage_options',
        //     'theme_settings_2',
        //     array(self::$basePath, 'create_admin_page')
        // );
    }

    /**
     * Register a setting and its sanitization callback.
     *
     * We are only registering 1 setting so we can store all options in a single option as
     * an array. You could, however, register a new setting for each option
     *
     * @since 1.0.0
     */
    public static function register_settings() {
        register_setting('theme_options', 'theme_options', array(self::$basePath, 'arrThemeOption'));
    }

    public static function add_scripts(){
        wp_enqueue_style( 'tabs', get_template_directory_uri() . '/static/css/admin/tabs.css' );
        // wp_enqueue_script( 'custom-name', get_template_directory_uri() . '/path/to/test.js' );
    }

    /**
     * Sanitization callback
     *
     * @since 1.0.0
     */
    public static function arrThemeOption($options) {

        // If we have options lets sanitize them
        $options['input'];
        $options['checkbox'];
        $options['selectbox'];
        if ($options) {
            // Input
            foreach ($options['input'] as $key => $value) {
                if (!empty($value)) {
                    $options['input'][$key] = sanitize_text_field($value);
                } else {
                    unset($options['input'][$key]); // Remove from options if empty
                }
            }
            // Checkbox
            foreach ($options['checkbox'] as $key => $value) {
                if (!empty($value)) {
                    $options['checkbox'][$key] = 1;
                } else {
                    unset($options['checkbox'][$key]); // Remove from options if not checked
                }
            }
            // Select
            foreach ($options['selectbox'] as $key => $value) {
                if (!empty($value)) {
                    $options['selectbox'][$key] = sanitize_text_field($value);
                }
            }
        }

        // Return sanitized options
        return $options;

    }

    /**
     * Settings page output
     *
     * @since 1.0.0
     */
    public static function create_admin_page() {
        return require_once 'admin-template.php';
    }

    public static function addAdminBar()
    {
        global $wp_admin_bar;
        if(!is_super_admin() || !is_admin_bar_showing()) return;
        // Add Parent Menu
        $argsParent = array(
            'id' => 'theme-option',
            'href' => admin_url('/admin.php?page='.self::$slugPage)
        );
        $argsParent['title'] = self::$title;

        $wp_admin_bar->add_menu($argsParent, 1000);
    }
}
