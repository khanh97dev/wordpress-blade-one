@extends('layout.default')
@section('content')
  <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
      <?php
      // Start the Loop.
      while ( have_posts() ) :
        the_post();

        /*f
         * Include the post format-specific template for the content. If you want
         * to use this in a child theme, then include a file called content-___.php
         * (where ___ is the post format) and that will be used instead.
         */
        echo view('partials.content');

        endwhile;
      ?>
    </div><!-- #content -->
  </div><!-- #primary -->
@endsection
