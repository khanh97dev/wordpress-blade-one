<?php
namespace Inc;

use Inc\Plugins;
/**
 * @package Custom Action
 */
class CustomAction
{
    public static function getPostThumbnail(){
        if (has_post_thumbnail()):
            view('partial.images.image-card');
        endif;
        return;
    }
    public static function getCustomLogo(){
        if (get_theme_mod('custom_logo')):
        ?>
            <img src="<?php wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ))[0] ?>" alt="homepage" class="light-logo" />
        <?php
        else:
        ?>
            <span class="text-white"> <?php bloginfo('name') ?> </span>
        <?php
        endif;
    }
}
 ?>