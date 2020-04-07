<?php
namespace Inc;
final class BackCompack {

  public public function __construct()
  {
    add_action( 'after_switch_theme', array($this, 'twentyfourteen_switch_theme') );
    add_action( 'load-customize.php', array($this, 'twentyfourteen_customize') );
    add_action( 'template_redirect', array($this, 'twentyfourteen_preview') );
    add_action( 'after_switch_theme', array($this, 'twentyfourteen_switch_theme') );
    add_action( 'load-customize.php', array($this, 'twentyfourteen_customize') );
    add_action( 'template_redirect', array($this, 'twentyfourteen_preview') );
  }

  /**
   * Prevent switching to Twenty Fourteen on old versions of WordPress.
   *
   * Switches to the default theme.
   *
   * @since Twenty Fourteen 1.0
   */
  public function twentyfourteen_switch_theme() {
    switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
    unset( $_GET['activated'] );
    add_action( 'admin_notices', array($this, 'twentyfourteen_upgrade_notice') );
  }

  /**
   * Add message for unsuccessful theme switch.
   *
   * Prints an update nag after an unsuccessful attempt to switch to
   * Twenty Fourteen on WordPress versions prior to 3.6.
   *
   * @since Twenty Fourteen 1.0
   */
  public function twentyfourteen_upgrade_notice() {
    /* translators: %s: WordPress version. */
    $message = sprintf( __( 'Twenty Fourteen requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'twentyfourteen' ), $GLOBALS['wp_version'] );
    printf( '<div class="error"><p>%s</p></div>', $message );
  }

  /**
   * Prevent the Customizer from being loaded on WordPress versions prior to 3.6.
   *
   * @since Twenty Fourteen 1.0
   */
  public function twentyfourteen_customize() {
    wp_die(
      /* translators: %s: WordPress version. */
      sprintf( __( 'Twenty Fourteen requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'twentyfourteen' ), $GLOBALS['wp_version'] ),
      '',
      array(
        'back_link' => true,
      )
    );
  }

  /**
   * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
   *
   * @since Twenty Fourteen 1.0
   */
  public function twentyfourteen_preview() {
    if ( isset( $_GET['preview'] ) ) {
      /* translators: %s: WordPress version. */
      wp_die( sprintf( __( 'Twenty Fourteen requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'twentyfourteen' ), $GLOBALS['wp_version'] ) );
    }
  }
}