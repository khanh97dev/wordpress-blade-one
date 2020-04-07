<article id="post-{{ the_ID() }}" {{ post_class() }}>
  {{ twentyfourteen_post_thumbnail() }}
  {{--  Page thumbnail and title. --}}
  {{ the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ) }}

  <div class="entry-content">
    <?php
      the_content();
      wp_link_pages(
        array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
        )
      );

      edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
    ?>
  </div><!-- .entry-content -->
</article><!-- #post-{{ the_ID() }} -->
