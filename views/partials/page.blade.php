@extends('layout.default')
@section('content')
  <div id="main-content" class="main-content">

  @if ( is_front_page() && twentyfourteen_has_featured_posts() )
    @include('partials.featured-content')
  @endif
    <div id="primary" class="content-area">
      <div id="content" class="site-content" role="main">

        <?php
        // Start the Loop.
        while ( have_posts() ) :
          the_post();

          echo view('partials.content-page');

          if ( comments_open() || get_comments_number() ) {
            comments_template();
          }
          endwhile;
        ?>

      </div><!-- #content -->
    </div><!-- #primary -->
    @include('partials.sidebar-content')
  </div><!-- #main-content -->

  {{ get_sidebar() }}

@endsection