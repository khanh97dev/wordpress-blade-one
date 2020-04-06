<div class="navigation">
    <div class="container">
        <div class="logo-vng"><a href="{{ bloginfo( 'url' ) }}"><img src="{{ bloginfo('template_url').'/assets/images/logo.png' }}" alt=""><span class="logo-text">{{ bloginfo('name') }}</span></a></div>
        <div class="menu">
            @if (function_exists('pll_the_languages'))
                <div class="lang-selector">
                    @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['vi']['current_lang'])
                        <a class="toggle-open layer-2 toggle-lang-open" data-target=".lang-open" href="javascript:;" id="nation-pc">VIE</a>
                    @else
                        <a class="toggle-open layer-2 toggle-lang-open" data-target=".lang-open" href="javascript:;" id="nation-pc">ENG</a>
                    @endif
                    <div class="lang-open layer-2">
                        <a class="lang-select" data-lang="#googtrans(en|vi)" href="{{ pll_the_languages(array('raw'=>1))['vi']['url'] }}">VIE</a>
                        <a class="lang-select" data-lang="#googtrans(vi|en)" href="{{ pll_the_languages(array('raw'=>1))['en']['url'] }}">ENG</a>
                    </div>
                </div>
            @endif
            <a href="javascript:;" class="nav-toggle toggle-open" data-target="nav"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 24 24">
                    <g>
                        <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z" />
                        <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z" />
                        <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z" />
                    </g>
                </svg></a>

                @php
                    echo wp_nav_menu(
                        array(
                        "container"         => "nav",// tag nav is container
                        "container_class"   => "main-nav__list", // class "nav"
                        "container_id"      => "",  // id "nav"
                        "fallback_cb"       => true,
                        "menu_class"        => "", // class "li" is item
                        "dropdown"          => "nav-dad", // class item has submenu
                        "theme_location"    => 'home', // location show menu
                        "item_class"        => '', // submenu class item
                        "sub_menu"          => '', // classs submenu
                        "walker"            => new \Inc\Menu\MenuHome,
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s<li class="line"></li></ul>' // add wrap item li
                    ) );
                @endphp
        </div>
    </div>
</div>