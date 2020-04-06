{{-- NAV FRONT PAGE --}}
<div class="navigation">
    <a class="logo-text p-absolute" href="{{ bloginfo( 'url' ) }}"><span>{{ bloginfo('name') }}</span></a>
    @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
        <a class="toggle-open layer-2 toggle-lang-open" data-target=".lang-open" href="javascript:;" id="nation-pc">ENG</a>
    @else
        <a class="toggle-open layer-2 toggle-lang-open" data-target=".lang-open" href="javascript:;" id="nation-pc">VIE</a>
    @endif
    @if (function_exists('pll_the_languages'))
        <div class="lang-open layer-2">
            <a class="lang-select" data-lang="#googtrans(en|vi)" href="{{ pll_the_languages(array('raw'=>1))['vi']['url'] }}">VIE</a>
            <a class="lang-select" data-lang="#googtrans(vi|en)" href="{{ pll_the_languages(array('raw'=>1))['en']['url'] }}">ENG</a>
        </div><a class="toggle-open toggle-nav-open layer-5" data-target=".navigation" href="javascript:;"><span class="burger-vng"></span></a><a class="toggle-open toggle-nav-close layer-5" data-target=".navigation" href="javascript:;"><span class="burger-vng"></span></a>
    @endif
    <div class="navigation-open layer-4 vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="nav-left col-12 col-lg-6 bg-supernova p-0">
                    <div class="container-fluid nav-left-container"><a class="logo-text" href="#">{{ bloginfo('name') }}</a></div>
                </div>
                <!-- MENU FRONT PAGE -->
                <div class="nav-right col-12 col-lg-6 bg-mecury">
                    <div class="nav-right-container container-fluid f-mavenpro text-dark">
                        {{
                            wp_nav_menu(
                                array(
                                "container"         => "nav",// tag nav is container
                                "container_class"   => "f-40 text-dark text-right", // class "nav"
                                "container_id"      => "",  // id "nav"
                                "fallback_cb"       => true,
                                "menu_class"        => "", // class "li" is item
                                "dropdown"          => "nav-dad", // class item has submenu
                                "theme_location"    => 'home', // location show menu
                                "item_class"        => '', // submenu class item
                                "sub_menu"          => '', // submenu
                                "walker"            => new \Inc\Menu\MenuHome
                            ) )
                    }}
                    </div>
                </div>
                <!-- .MENU FRONT PAGE -->
            </div>
        </div>
    </div>
</div>
{{-- .NAV FRONT PAGE --}}