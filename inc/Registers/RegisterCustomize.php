<?php
namespace Inc\Registers;

/**
 * @package metabox
 */
class RegisterCustomize
{
    public function __construct()
    {
        // add_action('customize_preview_init', array($this, 'customizerLivePreview'));
        // add_action('customize_register', array($this, 'registerPanel'));
        add_action('customize_register', array($this, 'registerSection'));
        add_action('customize_register', array($this, 'resgisterControl'));
    }

    /**
     * This outputs the javascript needed to automate the live settings preview.
     * Also keep in mind that this function isn't necessary unless your settings
     * are using 'transport'=>'postMessage' instead of the default 'transport'
     * => 'postMessage'
     *
     * Used by hook: 'customize_preview_init'
     */

    public static function registerSection($wp_customize)
    {
        $wp_customize->add_section('section_home_colors', array(
            'title'    => __('Home Color Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));

        $wp_customize->add_section('section_home_header', array(
            'title'    => __('Home Header Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));

        $wp_customize->add_section('section_home_number', array(
            'title'    => __('Home Number Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));

        $wp_customize->add_section('section_home_product', array(
            'title'    => __('Home Product Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));

        $wp_customize->add_section('section_home_history', array(
            'title'    => __('Home History Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));

        $wp_customize->add_section('section_home_about', array(
            'title'    => __('Home About Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));

        $wp_customize->add_section('section_home_news', array(
            'title'    => __('Home News Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));
        $wp_customize->add_section('section_home_career', array(
            'title'    => __('Home Career Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));

        $wp_customize->add_section('section_home_partner', array(
            'title'    => __('Home Partner Option', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));

        $wp_customize->add_section('section_footer', array(
            'title'    => __('Footer', TEXT_DOMAIN_THEME),
            'priority' => 70,
        ));
    }

    public static function resgisterControl($wp_customize)
    {
        // begin section home colors
        $wp_customize->add_setting('setting_section_color_primary', array(
            'transport' => 'postMessage',
            'default'   => __('#72b448', TEXT_DOMAIN_THEME),
        ));
        $wp_customize->add_control(
            new \WP_Customize_Color_Control(
                $wp_customize,
                'setting_section_color_primary',
                array(
                    'label'    => __('Primary color', TEXT_DOMAIN_THEME),
                    'section'  => 'section_home_colors',
                    'settings' => 'setting_section_color_primary',
                )
            )
        );
        $wp_customize->add_setting('setting_section_color_secondary', array(
            'transport' => 'postMessage',
            'default'   => __('#345A2B', TEXT_DOMAIN_THEME),
        ));
        $wp_customize->add_control(
            new \WP_Customize_Color_Control(
                $wp_customize,
                'setting_section_color_secondary',
                array(
                    'label'    => __('Secondary color', TEXT_DOMAIN_THEME),
                    'section'  => 'section_home_colors',
                    'settings' => 'setting_section_color_secondary',
                )
            )
        );

        $wp_customize->add_setting('setting_section_bg_primary', array(
            'transport' => 'postMessage',
            'default'   => __('#3f88b5', TEXT_DOMAIN_THEME),
        ));
        $wp_customize->add_control(
            new \WP_Customize_Color_Control(
                $wp_customize,
                'setting_section_bg_primary',
                array(
                    'label'    => __('Primary Background', TEXT_DOMAIN_THEME),
                    'section'  => 'section_home_colors',
                    'settings' => 'setting_section_bg_primary',
                )
            )
        );

        $wp_customize->add_setting('setting_section_bg_primary', array(
            'transport' => 'postMessage',
            'default'   => __('#3f88b5', TEXT_DOMAIN_THEME),
        ));
        $wp_customize->add_control(
            new \WP_Customize_Color_Control(
                $wp_customize,
                'setting_section_bg_primary',
                array(
                    'label'    => __('Primary Background', TEXT_DOMAIN_THEME),
                    'section'  => 'section_home_colors',
                    'settings' => 'setting_section_bg_primary',
                )
            )
        );
        $wp_customize->add_setting('setting_section_number_circle', array(
            'transport' => 'postMessage',
            'default'   => __('#3f88b5', TEXT_DOMAIN_THEME),
        ));
        $wp_customize->add_control(
            new \WP_Customize_Color_Control(
                $wp_customize,
                'setting_section_number_circle',
                array(
                    'label'    => __('Color Section Number Circle', TEXT_DOMAIN_THEME),
                    'section'  => 'section_home_colors',
                    'settings' => 'setting_section_number_circle',
                )
            )
        );
        // end section home colors

        // begin section home header
        for ($i = 1; $i < 3; $i++) :
            $wp_customize->add_setting('setting_section_head_' . $i, array(
                'transport' => 'postMessage',
                'default'   => __('Head ' . $i, TEXT_DOMAIN_THEME),
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    'setting_section_head_' . $i,
                    array(
                        'label'    => __('Section Head Text ' . $i, TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_header',
                        'settings' => 'setting_section_head_' . $i,
                    )
                )
            );
            $wp_customize->selective_refresh->add_partial(
                "setting_section_head_$i",
                array(
                    'selector' => ".text-hero .head-$i",
                )
            );
        endfor;
        $wp_customize->add_setting("setting_section_head_image", array(
            'transport' => 'postMessage',
            'default' => get_template_directory_uri() . '/assets/images/medical-header.jpg'
        ));
        $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, "setting_section_head_image", array(
            'label'    => __("Image", TEXT_DOMAIN_THEME),
            'section'  => 'section_home_header',
            'settings' => "setting_section_head_image",
        )));
        // end section home header

        // begin section cricle number (section-number.blade)
        $wp_customize->add_setting('setting_section_number_visible', array(
            'transport' => 'postMessage',
            'default' => 1
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_number_visible', array(
                'label' => __('Show/Hide', TEXT_DOMAIN_THEME),
                'section' => 'section_home_number',
                'type' => 'checkbox',
                'settings' => 'setting_section_number_visible',
            )));

        $wp_customize->selective_refresh->add_partial(
            'setting_section_number_visible',
            array(
                'selector' => 'section.s-numbers',
                'container_inclusive' => true
            )
        );
        for ($i = 1; $i < 5; $i++) :
            $wp_customize->add_setting('setting_section_number_' . $i, array(
                'transport' => 'postMessage',
                'default'   => __('0', TEXT_DOMAIN_THEME),
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    'setting_section_number_' . $i,
                    array(
                        'label'    => __('Section Number ' . $i, TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_number',
                        'settings' => 'setting_section_number_' . $i,
                    )
                )
            );
            $wp_customize->add_setting('setting_section_text_' . $i, array(
                'transport' => 'postMessage',
                'default' => __($i, TEXT_DOMAIN_THEME),
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    'setting_section_text_' . $i,
                    array(
                        'label'    => __('Section Text ' . $i, TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_number',
                        'settings' => 'setting_section_text_' . $i,
                    )
                )
            );
        endfor;
        // end section cricle number (section-number.blade)

        // begin section product (section-products.blade)
        $wp_customize->add_setting('setting_section_products_visible', array(
            'transport' => 'postMessage',
            'default' => 1
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_products_visible', array(
            'label' => __('Show/Hide', TEXT_DOMAIN_THEME),
            'section' => 'section_home_product',
            'type' => 'checkbox',
            'settings' => 'setting_section_products_visible',
        )));
        $wp_customize->selective_refresh->add_partial(
            'setting_section_products_visible',
            array(
                'selector' => 'section.s-products',
                'container_inclusive' => true
            )
        );

        for ($i = 1; $i <= 4; $i++) :
            $wp_customize->add_setting("setting_section_product[item_$i][title]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_product[item_$i][title]", array(
                'label'    => __("Title Vietnamese $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_product',
                'settings' => "setting_section_product[item_$i][title]",
            )));
            $wp_customize->add_setting("setting_section_product[item_$i][title_en]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_product[item_$i][title_en]", array(
                'label'    => __("Title English $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_product',
                'settings' => "setting_section_product[item_$i][title_en]",
            )));

            $wp_customize->add_setting("setting_section_product[item_$i][content]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_product[item_$i][content]", array(
                'label'    => __("Content Vietnamese $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_product',
                'type'     => 'textarea',
                'settings' => "setting_section_product[item_$i][content]",
            )));

            $wp_customize->add_setting("setting_section_product[item_$i][content_en]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_product[item_$i][content_en]", array(
                'label'    => __("Content English $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_product',
                'type'     => 'textarea',
                'settings' => "setting_section_product[item_$i][content_en]",
            )));

            // set image
            $wp_customize->add_setting("setting_section_product[item_$i][img]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Cropped_Image_Control($wp_customize, "setting_section_product[item_$i][img]", array(
                'label'    => __("Image $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_product',
                'settings' => "setting_section_product[item_$i][img]",
                'height' => '400',
                'width' => '600',
            )));

            // set image
            $wp_customize->add_setting("setting_section_product[item_$i][icon]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, "setting_section_product[item_$i][icon]", array(
                'label'    => __("Icon $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_product',
                'settings' => "setting_section_product[item_$i][icon]",
            )));
        endfor;
        // end section product (section-products.blade)

        // begin section history (section-history.blade)
        $wp_customize->add_setting('setting_section_history_visible', array(
            'transport' => 'postMessage',
            'default' => 1
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_history_visible', array(
            'label' => __('Show/Hide', TEXT_DOMAIN_THEME),
            'section' => 'section_home_history',
            'type' => 'checkbox',
            'settings' => 'setting_section_history_visible',
        )));
        $wp_customize->selective_refresh->add_partial(
            'setting_section_history_visible',
            array(
                'selector' => 'section.s-history',
                'container_inclusive' => true
            )
        );

        for ($i = 1; $i <= 5; $i++) {
            $wp_customize->add_setting("setting_section_history_title_vi_$i", array(
                'transport' => 'postMessage',
                'default' => __('KHỞI NGHIỆP', TEXT_DOMAIN_THEME),
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    "setting_section_history_title_vi_$i",
                    array(
                        'label'    => __("Section title Vietnamese $i", TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_history',
                        'settings' => "setting_section_history_title_vi_$i",
                    )
                )
            );

            $wp_customize->add_setting("setting_section_history_title_en_$i", array(
                'transport' => 'postMessage',
                'default' => __('STARTING A BUSINESS', TEXT_DOMAIN_THEME),
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    "setting_section_history_title_en_$i",
                    array(
                        'label'    => __("Section title English $i", TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_history',
                        'settings' => "setting_section_history_title_en_$i",
                    )
                )
            );
            $wp_customize->add_setting("setting_section_history_year_" . $i . "_frist", array(
                'transport' => 'postMessage',
                'default'   => __('2004', TEXT_DOMAIN_THEME),
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    "setting_section_history_year_" . $i . "_frist",
                    array(
                        'label'    => __("Section year $i first", TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_history',
                        'settings' => "setting_section_history_year_" . $i . "_frist",
                    )
                )
            );
            $wp_customize->add_setting("setting_section_history_year_" . $i . "_secondary", array(
                'transport' => 'postMessage',
                'default' => __('2005', TEXT_DOMAIN_THEME),
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    "setting_section_history_year_" . $i . "_secondary",
                    array(
                        'label'    => __("Section year $i secodary", TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_history',
                        'settings' => "setting_section_history_year_" . $i . "_secondary",
                    )
                )
            );
            // content slide
            $wp_customize->add_setting("setting_section_history_content_vi_$i", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    "setting_section_history_content_vi_$i",
                    array(
                        'type'     => 'textarea',
                        'label'    => __("Section content Vietnamese $i", TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_history',
                        'settings' => "setting_section_history_content_vi_$i",
                    )
                )
            );
            $wp_customize->add_setting("setting_section_history_content_en_$i", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(
                new \WP_Customize_Control(
                    $wp_customize,
                    "setting_section_history_content_en_$i",
                    array(
                        'type'     => 'textarea',
                        'label'    => __("Section content English $i", TEXT_DOMAIN_THEME),
                        'section'  => 'section_home_history',
                        'settings' => "setting_section_history_content_en_$i",
                    )
                )
            );
        } // end for
        // end section history (section-history.blade)

        // begin section about (section-about.blade)
        $wp_customize->add_setting('setting_section_about_visible', array(
            'transport' => 'postMessage',
            'default' => 1
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_about_visible', array(
            'label' => __('Show/Hide', TEXT_DOMAIN_THEME),
            'section' => 'section_home_about',
            'type' => 'checkbox',
            'settings' => 'setting_section_about_visible',
        )));
        $wp_customize->selective_refresh->add_partial(
            'setting_section_about_visible',
            array(
                'selector' => 'section.s-aboutus',
                'container_inclusive' => true
            )
        );

        $wp_customize->add_setting('setting_section_about_title', array(
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_about_title', array(
            'label' => __('Title Main VietNamese', TEXT_DOMAIN_THEME),
            'description' => __('Đây là tiêu đề đâu tiên khi nhin thấy trang', TEXT_DOMAIN_THEME),
            'section' => 'section_home_about',
            'settings' => 'setting_section_about_title',
            'type' => 'textarea'
        )));

        $wp_customize->add_setting('setting_section_about_title_en', array(
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_about_title_en', array(
            'label' => __('Title Main English', TEXT_DOMAIN_THEME),
            'description' => __('This is main title!', TEXT_DOMAIN_THEME),
            'section' => 'section_home_about',
            'settings' => 'setting_section_about_title_en',
            'type' => 'textarea'
        )));

        $count_about = 5;
        for ($i = 1; $i <= $count_about; $i++) :
            $wp_customize->add_setting("setting_section_about[item_$i][title]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_about[item_$i][title]", array(
                'label'    => __("Title Vietnamese $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_about',
                'settings' => "setting_section_about[item_$i][title]",
            )));

            $wp_customize->add_setting("setting_section_about[item_$i][title_en]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_about[item_$i][title_en]", array(
                'label'    => __("Title English $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_about',
                'settings' => "setting_section_about[item_$i][title_en]",
            )));

            $wp_customize->add_setting("setting_section_about[item_$i][content]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_about[item_$i][content]", array(
                'label'    => __("Content VienNamese $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_about',
                'type'     => 'textarea',
                'settings' => "setting_section_about[item_$i][content]",
            )));

            $wp_customize->add_setting("setting_section_about[item_$i][content_en]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_about[item_$i][content_en]", array(
                'label'    => __("Content English $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_about',
                'type'     => 'textarea',
                'settings' => "setting_section_about[item_$i][content_en]",
            )));

            $wp_customize->add_setting("setting_section_about[item_$i][img]", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, "setting_section_about[item_$i][img]", array(
                'label'    => __("Image $i", TEXT_DOMAIN_THEME),
                'section'  => 'section_home_about',
                'settings' => "setting_section_about[item_$i][img]",
            )));
        endfor;
        // end section about (section-about.blade)

        // begin section news (section-news.blade)
        $wp_customize->add_setting(
            'setting_section_news_title_vi',
            array(
                'default'           => 'TIN TỨC &amp; SỰ KIỆN',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            'setting_section_news_title_vi',
            array(
                'label'           => __( 'Title section vi: ', TEXT_DOMAIN_THEME ),
                'section'         => 'section_home_news',
                'type'            => 'text',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'setting_section_news_title_vi',
            array(
                'selector' => ' section.s-news h1.text-editor',
            )
        );
        $wp_customize->add_setting(
            'setting_section_news_title_en',
            array(
                'default'           => 'NEWS &amp; EVENT',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            'setting_section_news_title_en',
            array(
                'label'           => __( 'Title section en: ', TEXT_DOMAIN_THEME ),
                'section'         => 'section_home_news',
                'type'            => 'text',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'setting_section_news_title_en',
            array(
                'selector' => ' section.s-news h1.text-editor',
            )
        );
        // end section news (section-news.blade)

        // begin section career (section-career.blade)
        $wp_customize->add_setting('setting_section_career_visible', array(
            'transport' => 'postMessage',
            'default' => 1
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_career_visible', array(
            'label' => __('Show/Hide', TEXT_DOMAIN_THEME),
            'section' => 'section_home_career',
            'type' => 'checkbox',
            'settings' => 'setting_section_career_visible',
        )));
        $wp_customize->selective_refresh->add_partial(
            'setting_section_career_visible',
            array(
                'selector' => 'section.s-career',
                'container_inclusive' => true
            )
        );

        for ($i = 1; $i <= 2; $i++) :
            $wp_customize->add_setting('setting_section_career[img]', array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, 'setting_section_career[img]', array(
                'label'    => __('Image', TEXT_DOMAIN_THEME),
                'section'  => 'section_home_career',
                'settings' => 'setting_section_career[img]'
            )));

            $wp_customize->add_setting('setting_section_career[content_vi]', array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_career[content_vi]', array(
                'label'    => __('Content Vietnamese', TEXT_DOMAIN_THEME),
                'section'  => 'section_home_career',
                'settings' => 'setting_section_career[content_vi]',
                'type'     => 'textarea'
            )));

            $wp_customize->add_setting('setting_section_career[content_en]', array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_career[content_en]', array(
                'label'    => __('Content English', TEXT_DOMAIN_THEME),
                'section'  => 'section_home_career',
                'settings' => 'setting_section_career[content_en]',
                'type'     => 'textarea'
            )));

            $wp_customize->add_setting('setting_section_career[link]', array(
                'transport' => 'postMessage',
                'default' => '#'
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_career[link]', array(
                'label'    => __('Link Vietnamese', TEXT_DOMAIN_THEME),
                'section'  => 'section_home_career',
                'settings' => 'setting_section_career[link]',
                'type'     => 'text'
            )));

            $wp_customize->add_setting('setting_section_career[link_en]', array(
                'transport' => 'postMessage',
                'default' => '#'
            ));
            $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_career[link_en]', array(
                'label'    => __('Link English', TEXT_DOMAIN_THEME),
                'section'  => 'section_home_career',
                'settings' => 'setting_section_career[link_en]',
                'type'     => 'text'
            )));
        endfor;
        // end section career (section-career.blade)

        // begin section partner (section-partner.blade)
        $wp_customize->add_setting('setting_section_partner_visible', array(
            'transport' => 'postMessage',
            'default' => 1
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_partner_visible', array(
                'label' => __('Show/Hide', TEXT_DOMAIN_THEME),
                'section' => 'section_home_partner',
                'type' => 'checkbox',
                'settings' => 'setting_section_partner_visible',
        )) );
        $wp_customize->selective_refresh->add_partial(
            'setting_section_partner_visible',
            array(
                'selector' => 'section.s-partner',
                'container_inclusive' => true
            )
        );

        $wp_customize->add_setting('setting_section_partner_content_en', array(
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_partner_content_en', array(
            'label' => __('Content English', TEXT_DOMAIN_THEME),
            'section' => 'section_home_partner',
            'settings' => 'setting_section_partner_content_en',
            'type'     => 'textarea'
        )));

        $wp_customize->add_setting('setting_section_partner_content_vi', array(
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'setting_section_partner_content_vi', array(
            'label' => __('Content Vietnamese', TEXT_DOMAIN_THEME),
            'section' => 'section_home_partner',
            'settings' => 'setting_section_partner_content_vi',
            'type'     => 'textarea'
        )));
        // end section partner (section-pa.partner.blade)

        // begin footer (homepage.footer.blade)
        $wp_customize->add_setting("setting_section_footer[dia_chi]", array(
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_footer[dia_chi]", array(
            'label'    => __("Địa Chỉ", TEXT_DOMAIN_THEME),
            'section'  => 'section_footer',
            'settings' => 'setting_section_footer[dia_chi]',
            'textarea' => 'textarea'
        )));

        $wp_customize->add_setting("setting_section_footer[dien_thoai]", array(
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_footer[dien_thoai]", array(
            'label'    => __("Điện Thoại", TEXT_DOMAIN_THEME),
            'section'  => 'section_footer',
            'settings' => "setting_section_footer[dien_thoai]",
        )));

        $wp_customize->add_setting("setting_section_footer[fax]", array(
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_footer[fax]", array(
            'label'    => __("Fax", TEXT_DOMAIN_THEME),
            'section'  => 'section_footer',
            'settings' => "setting_section_footer[fax]",
        )));

        $wp_customize->add_setting("setting_section_footer[email]", array(
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, "setting_section_footer[email]", array(
            'label'    => __("Email", TEXT_DOMAIN_THEME),
            'section'  => 'section_footer',
            'settings' => "setting_section_footer[email]",
        )));
        // end footer (homepage.footer.blade)
    }
}
