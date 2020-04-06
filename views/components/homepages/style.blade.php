<link rel="StyleSheet" href="{{ bloginfo( 'template_url' ) }}/assets/css/font-homepage.css">
<link rel="StyleSheet" href="{{ bloginfo( 'template_url' ) }}/assets/css/skin-homepage.min.css">
{{-- <link rel="StyleSheet" href="{{ bloginfo( 'template_url' ) }}/assets/css/ma5-menu.min.css"> --}}
<link rel="StyleSheet" href="{{ bloginfo( 'template_url' ) }}/style.css">
<style type="text/css">
    /*setting_section_color_primary*/
    .text-supernova,
    .text-secondary,
    .logo-text span,
    section.s-products ul.products-list li a:before,
    section.s-history .timeline ul li:hover a strong,
    section.s-history .timeline ul li.active a strong
    {
        color: {{ get_theme_mod('setting_section_color_primary', "#72b448") }} !important
    }
    .bg-supernova, .bg-secondary, a.bt.bt-supernova,
    section.s-products ul.products-list li a:before {
        background-color: {{ get_theme_mod('setting_section_color_primary', "#72b448") }}
    }
    section.s-history .timeline ul li:hover a:before,
    section.s-history .timeline ul li.active a:before{
        border-color: {{ get_theme_mod('setting_section_color_primary', "#72b448") }}
    }
    section.s-partner span.title svg path {
        fill: {{ get_theme_mod('setting_section_color_primary', "#72b448") }}
    }

    /* setting_section_color_secondary */
    section.s-numbers .number-circle .number-circle-inner{
        border-color: {{ get_theme_mod( 'setting_section_color_secondary', '#345A2B') }}
    }

    /*setting_section_bg_primary*/
    a.bt.bt-tango,
    div.navigation div.lang-open.active a:hover,
    h1:after,
    hr.afterh1 {
        background: {{ get_theme_mod('setting_section_bg_primary', '#3f88b5') }};
    }

    .text-tango, .text-primary,
    nav ul li a:hover,
    nav ul li a.active,
    nav ul li.nav-dad.active a,
    nav ul li.nav-dad.active>ul>li a:hover,
    nav ul li.nav-dad.active>ul>li a.active
    {
        color: {{ get_theme_mod('setting_section_bg_primary', '#3f88b5') }}
    }
    /*setting_section_bg_primary*/

    /* section number circle */
    section.s-numbers .number-circle .number-circle-inner {
        color: {{ get_theme_mod('setting_section_number_circle' , '#3f88b5') }};
    }
    /* section number circle */
</style>