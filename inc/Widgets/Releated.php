<?php
namespace Inc\Widgets;

class Releated extends \WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'wpb_widget',

            // Widget name will appear in UI
            __('Bài viết mới (VNG theme)', TEXT_DOMAIN_THEME),

            // Widget description
            array('description' => __('Lấy tất cả bài viết mới nhất trong post', TEXT_DOMAIN_THEME))
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $relatedPosts = \Inc\Query\GuestQuery::relatedQuery(5);
        // This is where you run the code and display the output
        if (isset($relatedPosts)) {
            echo view('templates.widget-releated', array('relatedPosts' => $relatedPosts)); // display blade template
        } else {
            ?>
            <h2>
                <?php __( 'Xin hãy thêm bài viết mới', TEXT_DOMAIN_THEME ); ?>
            </h2>
            <?php
        }

        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Bài viết mới nhất', TEXT_DOMAIN_THEME);
        }
        // Widget admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php

    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
