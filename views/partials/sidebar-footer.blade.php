@php
if ( ! is_active_sidebar( 'sidebar-3' ) ) {
  return;
}
@endphp
<div id="supplementary">
  <div id="footer-sidebar" class="footer-sidebar widget-area" role="complementary">
    {{  dynamic_sidebar( 'sidebar-3' ) }}
  </div><!-- #footer-sidebar -->
</div><!-- #supplementary -->