<?php
namespace Inc;
final class EnqueueScript {
    public function __construct() {
        $this->dirBase = get_template_directory_uri() . '/static/';
        if(is_admin()){
            add_action('admin_enqueue_scripts', array($this, 'enqueueScriptsAdmin'));
        } else {
            add_action( 'init', array($this, 'enqueueScriptsCustomzie') );
        }
    }

    public function enqueueScriptsAdmin($hook)
    {
        wp_enqueue_script('admin_script', $this->dirBase . 'js/admin.js');
    }


    /**
     * style, script with customize preview
     * @return array
     */
    public function libraries() {
        return [
            'js' => [
                'customize_preview' => $this->dirBase.'js/app.js'
            ],
            'css' => [
                'customize_preview' => $this->dirBase.'css/app.css'
            ]
        ];
    }

    /**
     * enqueue script and style
     * @return void
     */
    public function enqueueScriptsCustomzie() {
        $customize = $this->libraries();
        foreach ($customize['css'] as $key => $style) {
            wp_enqueue_style( $key, $style);
        }
        foreach ($customize['js'] as $key => $script) {
            wp_enqueue_script( $key, $script, array( 'jquery','customize-preview' ), '1.0', true  );
        }
    }
}