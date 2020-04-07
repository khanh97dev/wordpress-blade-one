    </div><!-- #main -->

    <footer id="colophon" class="site-footer" role="contentinfo">

      @include('partials.sidebar-footer')

      <div class="site-info">
        {{ do_action( 'twentyfourteen_credits' ) }}
        @if(function_exists( 'the_privacy_policy_link' ))
          {{ the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' ) }}
        @endif
        <a href="{{ esc_url( __( 'https://wordpress.org/', 'twentyfourteen' ) ) }}" class="imprint">
          {{-- translators: %s: WordPress --}}
          {{ printf( __( 'Proudly powered by %s', 'twentyfourteen' ), 'WordPress' ) }}
        </a>
      </div><!-- .site-info -->
    </footer><!-- #colophon -->
  </div><!-- #page -->
  @include('components.script')
  {{ wp_footer() }}
</body>
</html>
