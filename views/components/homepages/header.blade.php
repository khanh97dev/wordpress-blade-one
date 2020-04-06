<header class="s-header">
    <div class="swiper-container banner-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <video
                    class="video-desktop"
                    width="100%"
                    height="1070"
                    autoplay=""
                    muted=""
                    poster="{{ get_theme_mod( 'setting_section_head_image', get_template_directory_uri().'/assets/images/medical-header.jpg' ) }}"
                    id="bgvid">
                </video>
                <img
                    class="banner-tablet"
                    src="{{ get_theme_mod( 'setting_section_head_image', get_template_directory_uri().'/assets/images/medical-header.jpg' ) }}"
                    alt="">
                <img
                    class="banner-mobile"
                    src="{{ get_theme_mod( 'setting_section_head_image', get_template_directory_uri().'/assets/images/medical-header.jpg' ) }}"
                    alt="">
                <div class="content m-auto">
                    <div class="text-hero f-unisect-bold text-upper text-center f-l-70 text-light box-ani slideInDown">
                        <span class="head-1">{{ get_theme_mod('setting_section_head_1') }}</span>
                        <br>
                        <span class="head-2">{{ get_theme_mod('setting_section_head_2') }}</span>
                    </div>
                    <div class="text-sub f-mavenpro f-l-30 p-t-10 text-light text-center box-ani slideInUp"></div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination banner-pagination"></div>
    </div>
    <div class="vnglogo"><img src="{{ bloginfo('template_url').'/assets/images/logo.png' }}" alt=""></div>
</header>