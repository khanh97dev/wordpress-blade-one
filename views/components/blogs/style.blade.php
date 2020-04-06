<style>
    .posts__loading--hidden {
        display: none;
    }
    /*setting_section_color_primary*/
    .text-supernova,
    div.navigation div.logo-vng span.logo-text,
    .text-secondary,
    .logo-text span,
    section.s-products ul.products-list li a:before,
    section.s-history .timeline ul li:hover a strong,
    section.s-history .timeline ul li.active a strong
    {
        color: {{ get_theme_mod('setting_section_color_primary', "#72b448") }} !important
    }
    .bg-supernova, .bg-secondary, a.bt.bt-supernova,
    div.navigation div.lang-open.active a:hover,
    div.navigation div.menu nav ul li ul li:hover a,
    div.navigation div.menu div.lang-selector .lang-open a:hover {
        background-color: {{ get_theme_mod('setting_section_color_primary', "#72b448") }}
    }
    div.navigation div.menu a.nav-toggle svg{
        fill: {{ get_theme_mod('setting_section_color_primary', "#72b448") }};
    }
    section.s-history .timeline ul li:hover a:before,
    div.navigation div.menu div.lang-selector .lang-open.active,
    section.s-history .timeline ul li.active a:before{
        border-color: {{ get_theme_mod('setting_section_color_primary', "#72b448") }}
    }
    div.navigation div.menu div.lang-selector .lang-open.active:before{
        border-color: transparent transparent {{ get_theme_mod('setting_section_color_primary', "#72b448") }} transparent;
    }
    section.s-partner span.title svg path {
        fill: {{ get_theme_mod('setting_section_color_primary', "#72b448") }}
    }

    /* setting_section_color_primary & setting_section_color_secondary */
    header.s-header {
        background-color: {{ get_theme_mod('setting_section_color_primary' , '#5FB337') }}; /* For browsers that do not support gradients */
        background-image: -webkit-linear-gradient(210deg, {{ get_theme_mod('setting_section_color_primary' , '#5FB337') }}, {{ get_theme_mod( 'setting_section_color_secondary', '#345A2B') }}, {{ get_theme_mod('setting_section_color_primary' , '#5FB337') }}, {{ get_theme_mod( 'setting_section_color_secondary', '#345A2B') }});
        background-image: -o-linear-gradient(210deg, {{ get_theme_mod('setting_section_color_primary' , '#5FB337') }}, {{ get_theme_mod( 'setting_section_color_secondary', '#345A2B') }}, {{ get_theme_mod('setting_section_color_primary' , '#5FB337') }}, {{ get_theme_mod( 'setting_section_color_secondary', '#345A2B') }});
        background-image: linear-gradient(300deg, {{ get_theme_mod('setting_section_color_primary' , '#5FB337') }}, {{ get_theme_mod( 'setting_section_color_secondary', '#345A2B') }}, {{ get_theme_mod('setting_section_color_primary' , '#5FB337') }}, {{ get_theme_mod( 'setting_section_color_secondary', '#345A2B') }}); /* Standard syntax (must be last) */
    }

    /*setting_section_bg_primary*/
    a.bt.bt-tango,
    div.navigation div.menu nav ul li.line:after,
    div.navigation div.menu nav ul li ul li.active a,
    section.s-products ul.products-list li a:before,
    .sidebar div.topnews h2:before,
    h2.widget-title:before,
    h1:before,
    h1:after,
    hr.afterh1 {
        background: {{ get_theme_mod('setting_section_bg_primary', '#3f88b5') }};
    }

    .text-tango, .text-primary,
    nav ul li a:hover,
    nav ul li a.active,
    nav ul li.nav-dad.active a,
    nav ul li.nav-dad.active>ul>li a:hover,
    nav ul li.nav-dad.active>ul>li a.active,
    section.s-numbers .number-circle .number-circle-inner
    {
        color: {{ get_theme_mod('setting_section_bg_primary', '#3f88b5') }} !important;
    }
    /*setting_section_bg_primary*/

    div.navigation div.menu nav ul li:hover ul,
    div.navigation div.menu nav ul li.opennav ul,
    div.navigation div.menu nav ul li:hover ul, div.navigation div.menu nav ul li:focus ul
    {
        border-color: {{ get_theme_mod('setting_section_bg_primary', '#3f88b5') }} !important
    }
    /* section number circle */
</style>
@stack('style')