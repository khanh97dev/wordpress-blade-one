<section class="s-aboutus bg-steelgray">
    <div class="container"><a class="h1href" href="#">
            <h1 class="text-light f-unisect text-center">
                @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                    WE ARE {{ bloginfo( 'name' ) }}
                @else
                    CHÚNG TÔI LÀ {{ bloginfo( 'name' ) }}
                @endif
            </h1>
        </a>
        <hr class="afterh1 hr-center">
        <p class="text-silver f-mavenpro p-t-20 container m-auto text-center">
            @if (get_theme_mod('setting_section_about_title') && get_theme_mod('setting_section_about_title_en'))
                @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                    {{ get_theme_mod('setting_section_about_title_en') }}
                @else
                    {{ get_theme_mod('setting_section_about_title') }}
                @endif
            @else
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            @endif
        </p>
    </div>
    <!-- Slide Images -->
    <div class="swiper-container about-container">
        <div class="swiper-wrapper">
            @if (get_theme_mod('setting_section_about'))
                @foreach (get_theme_mod('setting_section_about') as $item)
                    @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                        <div class="swiper-slide">
                            <a  href="{{ $item['img'] }}"
                                data-fancybox="about-img"
                                data-caption="<h3>{{ $item['title_en'] }}</h3><p>{{ $item['content_en'] }}</p>">
                                <img src="{{ $item['img'] }}"alt="{{ $item['title_en'] }}">
                            </a>
                        </div>
                    @else
                        <div class="swiper-slide">
                            <a  href="{{ $item['img'] }}"
                                data-fancybox="about-img"
                                data-caption="<h3>{{ $item['title'] }}</h3><p>{{ $item['content'] }}</p>">
                                <img src="{{ $item['img'] }}"alt="{{ $item['title'] }}">
                            </a>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="swiper-slide">
                    <a  href="https://picsum.photos/2400/800?image=130"
                        data-fancybox="about-img"
                        data-caption="<h3> {{ __('Tiêu Đề', TEXT_DOMAIN_THEME) }} </h3><p>{{ __('Nội Dung', TEXT_DOMAIN_THEME) }}</p>">
                        <img src="https://picsum.photos/2400/800?image=130" alt="{{ __('Tiêu Đề', TEXT_DOMAIN_THEME) }}">
                    </a>
                </div>
            @endif
        </div>
        <div class="swiper-button-next about-next">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;"
                xml:space="preserve" width="512px" height="512px">
                <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5   c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z   "
                    fill="#000000" />
            </svg>
        </div>
        <div class="swiper-button-prev about-prev">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;"
                xml:space="preserve" width="512px" height="512px">
                <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225   c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"
                    fill="#000000" />
            </svg>
        </div>
        <input type="hidden" id='itemTotal' value="9">
        <input type="hidden" id='itemPerPage' value="8">
        <input type="hidden" id='shortUri' value="//www.vng.com.vn/thu-vien-ajax">
        <input type="hidden" id='currentSection' value="home-gallery">
        <input type="hidden" id='section' value="thu-vien">
    </div>
    <!-- Slide Images -->
</section>