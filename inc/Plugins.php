<?php
namespace Inc;

/**
 * @package plugin
 * Plugin support theme
 */
class Plugins
{
    /**
     * @return object, get plugin blade
     */
    public static function blade(){
        require_once __DIR__ . "/blade_one/BladeOne.php";
        $blade = new \eftec\bladeone\BladeOne(get_template_directory() . '/views', __DIR__ . '/blade_one/cache', \eftec\bladeone\BladeOne::MODE_DEBUG);
        return $blade;
    }
}