<?php
require_once get_template_directory() . '/vendor/autoload.php';

use Inc\Init;
use Inc\CustomAction;
use Inc\Plugins;

if (!function_exists('initTheme')) :
  function initTheme()
  {
    return new Init;
  }
  add_action('after_setup_theme', 'initTheme');
endif;

if (!function_exists('blade')) :
  function view($view, $params = array())
  {
    return Plugins::blade()->run($view, $params);
  }
endif;


if (!function_exists('getPostThumbnail')) :
  function getPostThumbnail()
  {
    return CustomAction::getPostThumbnail();
  }
endif;

if (!function_exists('getCustomLogo')) :
  function getCustomLogo()
  {
    return CustomAction::getCustomLogo();
  }
endif;

if (!function_exists('get_post_image_url')) :
  function get_post_image_url()
  {
    if (get_the_post_thumbnail_url()) {
      return get_the_post_thumbnail_url();
    }
    return bloginfo('template_url') . '/assets/images/logo.png';
  }
endif;

if (!function_exists('twentyfourteen_post_thumbnail')) :
  /**
   * Display an optional post thumbnail.
   *
   * Wraps the post thumbnail in an anchor element on index
   * views, or a div element when on single views.
   *
   * @since Twenty Fourteen 1.0
   * @since Twenty Fourteen 1.4 Was made 'pluggable', or overridable.
   */
  function twentyfourteen_post_thumbnail()
  {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
      return;
    }

    if (is_singular()) :
?>

      <div class="post-thumbnail">
        <?php
        if ((!is_active_sidebar('sidebar-2') || is_page_template('page-templates/full-width.php'))) {
          the_post_thumbnail('twentyfourteen-full-width');
        } else {
          the_post_thumbnail();
        }
        ?>
      </div>

    <?php else : ?>

      <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
        <?php
        if ((!is_active_sidebar('sidebar-2') || is_page_template('page-templates/full-width.php'))) {
          the_post_thumbnail('twentyfourteen-full-width');
        } else {
          the_post_thumbnail('post-thumbnail', array('alt' => get_the_title()));
        }
        ?>
      </a>

<?php
    endif; // End is_singular().
  }
endif;
