<section class="s-partner">
    <div class="container"><a class="h1href" href="#">
            <h1 class="text-steelgray f-unisect text-center">
                @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                    PARTNER
                @else
                    ĐỐI TÁC
                @endif
            </h1>
        </a>
        <hr class="afterh1 hr-center">
        <p class="text-bluebayoux f-mavenpro p-t-20 container m-auto text-center">
            @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                {{ get_theme_mod('setting_sectin_partner_content_en', 'The list of partners is getting longer is a testament to the effective cooperation between VNG and its partners in Vietnam and many countries on the world. VNG is proud to name famous brands that VNG has been cooperating.') }}
            @else
                {{ get_theme_mod('setting_sectin_partner_content_vi', 'Danh sách đối tác ngày càng dài thêm là minh chứng cho mối quan hệ hợp tác hiệu quả giữa VNG cùng các đối tác tại Việt Nam và nhiều quốc gia trên thế giới. VNG tự hào được kể tên các thương hiệu nổi tiếng mà VNG đã và đang hợp tác.') }}
            @endif
        </p>
    </div>
    <div class="container-fluid p-0 m-b-20">
        <div class="swiper-container sponsor-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#" class="sponsor-logo-item"><img src="{{ bloginfo('template_url').'/assets' }}/images/partner/facebook.png"
                            alt=""></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="sponsor-logo-item"><img src="{{ bloginfo('template_url').'/assets' }}/images/partner/google.png"
                            alt=""></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="sponsor-logo-item"><img src="{{ bloginfo('template_url').'/assets' }}/images/partner/visa.png"
                            alt=""></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="sponsor-logo-item"><img src="{{ bloginfo('template_url').'/assets' }}/images/partner/marter_card.png"
                            alt=""></a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="sponsor-logo-item"><img src="{{ bloginfo('template_url').'/assets' }}/images/partner/waltdisney.png"
                            alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>