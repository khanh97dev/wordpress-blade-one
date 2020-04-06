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
}
