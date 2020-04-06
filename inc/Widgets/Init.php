<?php
namespace Inc\Widgets;

final class Init{
    public function __construct(){
        add_action( 'widgets_init', array($this, 'registerClasses') );
    }

    public function getClassesWidget() {
        return [
            Releated::class,
        ];
    }

    public function initWidget($classes){
        if (class_exists($classes)) :
            register_widget($classes);
        endif;
    }

    public function registerClasses() {
        $getClassesWidget = $this->getClassesWidget();
        foreach ($getClassesWidget as $class) {
            $this->initWidget($class);
        }
    }
}
