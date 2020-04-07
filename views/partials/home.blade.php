@extends('layout.home')

@section('content')
    <div id="main-content" class="main-content">

    @if ( is_front_page() ) {
      @include( 'partials.featured-content' );
    @endif
      <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

        <?php
        if ( have_posts() ) :
          // Start the Loop.
          while ( have_posts() ) :
            the_post();

            /*
             * Include the post format-specific template for the content. If you want
             * to use this in a child theme, then include a file called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            if(get_post_format())
              echo view('partials.content-'.get_post_format());
            else
              echo view('partials.content-none');

            endwhile;
          // Previous/next post navigation.

          else :
            // If no content, include the "No posts found" template.
            echo view('partials.content');

          endif;
          ?>

        </div><!-- #content -->
      </div><!-- #primary -->
      @include('partials.sidebar-content')
    </div><!-- #main-content -->
@endsection


@push('scripts')
<script>
if(document.getElementById('something')){
    const VueTest = new Vue({
        el: '#something',
        data: () => {
            return {
                something: 'text something'
            }
        }
    })
}
</script>
@endpush