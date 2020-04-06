{{-- scripts  --}}
<script src="{{ bloginfo('template_url') }}/assets/js/jquery-3.3.1.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/ma5-menu.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/jquery.mousewheel.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/smoothscroll.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/swiper-4.3.5.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/wow.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/jquery.viewportchecker.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/jquery.animateNumber.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/jquery.fancybox.min.js"></script>
<script src="{{ bloginfo('template_url') }}/assets/js/init.main.js"></script>
@if ( is_customize_preview() )
    <script src="{{ get_template_directory_uri().'/assets/js/vue.min.js' }}"></script>
    <script>
        const vues = document.querySelectorAll(".editable");
        const each = Array.prototype.forEach;
        const data = {
          message: "hello world"
        };
        each.call(vues, (el, index) => new Vue({el, data}))
    </script>
@endif

@stack('script')
