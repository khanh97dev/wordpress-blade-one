@extends('layout.default')

@section('content')
<section id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

      @if( have_posts() )
      <header class="page-header">
        <h1 class="page-title">
        <?php
        /* translators: %s: Search query. */
        printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() );
        ?>
        </h1>
      </header><!-- .page-header -->

        <?php
        // Start the Loop.
        while ( have_posts() ) :
          the_post();

          /*
           * Include the post format-specific template for the content. If you want
           * to use this in a child theme, then include a file called content-___.php
           * (where ___ is the post format) and that will be used instead.
           */
          if(get_post_format())
            echo view( 'content-'. get_post_format() );

          endwhile;
          // Previous/next post navigation.

        else :
          // If no content, include the "No posts found" template.
          echo view('partials.content-none');

        ?>
        @endif

    </div><!-- #content -->
  </section><!-- #primary -->
  @include('partials.sidebar-content')
@endsection