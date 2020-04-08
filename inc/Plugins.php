<?php
namespace Inc;

require_once __DIR__ . "/blade_one/BladeOne.php";
use eftec\bladeone\BladeOne;

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
        $blade = new BladeOne(
            get_template_directory() . '/views', __DIR__ . '/blade_one/cache',
            BladeOne::MODE_DEBUG
        );
        return $blade;
    }
}