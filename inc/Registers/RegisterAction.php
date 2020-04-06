<?php
namespace Inc\Registers;

use Inc\Menu\MenuHome;

/**
 * Register hook action
 */
class RegisterAction
{
    function __construct()
    {
        // register menu
        if(method_exists($this,'registerMenus'))
            add_action('init', array($this, 'registerMenus'));
        // register sidebar
        if(method_exists($this,'registerSidebars'))
            add_action('init', array($this, 'registerSidebars'));
        // register logo
        if(method_exists($this, 'registerCustomLogo'))
            add_action( 'after_setup_theme', array($this, 'registerCustomLogo'));
        // registers script and style, embed file script and style
        if(method_exists($this,'registerEnqueueScript'))
            add_action('wp_enqueue_scripts', array($this, 'registerEnqueueScript'));
        // register Tag
        if(method_exists($this,'registerTaxonomy')){
            add_action( 'init', array($this, 'registerTaxonomy'));
        }
        //  add suport
        add_post_type_support( 'page', 'excerpt' );
    }


    public static function registerMenus() {
        return register_nav_menus(
            array(
                'home' => __('Home Menu', TEXT_DOMAIN_THEME),
                'blog' => __('Blog Menu', TEXT_DOMAIN_THEME),
            )
        );
    }

    public static function registerEnqueueScript() {
        // wp_enqueue_script('');
        // wp_enqueue_style('');
    }

    public static function registerCustomLogo(){
        $defaults = array(
            'height'      => 40,
            'width'       => 40,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        );
        add_theme_support( 'custom-logo', $defaults );
    }

    /**
     *
     * add_action hook register_sidebar
     *
     */
    public static function registerSidebars(){
        register_sidebar(
            array (
                'name' => __( 'Fisrt Sidebar', TEXT_DOMAIN_THEME),
                'id' => 'first-sidebar',
                'description' => __( 'Fisrt Sidebar' , TEXT_DOMAIN_THEME),
                'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>'
            )
        );
        register_sidebar(
            array (
                'name' => __( 'Secondary Sidebar', TEXT_DOMAIN_THEME),
                'id' => 'secondary-sidebar',
                'description' => __( 'Secondary Sidebar' , TEXT_DOMAIN_THEME),
                'before_widget' => '<div class="widget-content">',
            )
        );
        register_sidebar(
            array (
                'name' => __( 'Three Sidebar', TEXT_DOMAIN_THEME),
                'id' => 'three-sidebar',
                'description' => __( 'Three Sidebar' , TEXT_DOMAIN_THEME),
            )
        );
    }

    /**
     * taxonomy (tag)
     */
    public static function registerTaxonomy(){
        register_taxonomy(
        'custom-tag', //taxonomy
        'my-custom-post', //post-type
        array(
            'hierarchical'  => false,
            'label'         => __( 'Tags', TEXT_DOMAIN_THEME),
            'singular_name' => __( 'Tag', TEXT_DOMAIN_THEME ),
            'rewrite'       => true,
            'query_var'     => true
        ));
    }
}