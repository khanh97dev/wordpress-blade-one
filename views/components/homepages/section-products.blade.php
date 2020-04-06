<section class="s-products">
    <div class="container-fluid">
        <div class="row">
            <div class="product-content col-12 col-xl-6 p-0 bg-supernova">
                <div class="container-fluid p-0">
                    <div class="swiper-container product-container">
                        <div class="swiper-wrapper p-b-20">
                            @if (get_theme_mod('setting_section_product'))
                                @foreach (get_theme_mod( 'setting_section_product') as $item)
                                    @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                                        <div class="swiper-slide">
                                            <div class="product-title text-capitalize text-center f-mavenpro f-20 p-v-20 f-unisect">
                                                {{ $item['title_en'] }}
                                            </div>
                                            <div class="box-product"><img class="product-item-1 product-item-1-phonea"
                                            src="{{ wp_get_attachment_image_url( $item['img'], 'full' ) }}" alt="{{ $item['title_en'] }}"></div>
                                            <div class="col-11 col-md-8 m-auto f-mavenpro f-20 text-center">
                                                {{ $item['content_en'] }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="swiper-slide">
                                            <div class="product-title text-capitalize text-center f-mavenpro f-20 p-v-20 f-unisect">
                                                {{ $item['title'] }}
                                            </div>
                                            <div class="box-product"><img class="product-item-1 product-item-1-phonea"
                                            src="{{ wp_get_attachment_image_url( $item['img'], 'full' ) }}" alt="{{ $item['title'] }}"></div>
                                            <div class="col-11 col-md-8 m-auto f-mavenpro f-20 text-center">
                                                {{ $item['content'] }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="swiper-slide">
                                    <div class="product-title text-center f-mavenpro f-20 p-v-20">
                                        Tiêu Đề
                                    </div>
                                    <div class="box-product"><img class="product-item-1 product-item-1-phonea"
                                        src="{{ bloginfo('template_url').'/assets/images/communication.png' }}" alt="">
                                    </div>
                                    <div class="col-11 col-md-8 m-auto f-mavenpro f-20 text-center">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, iure?
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-nav col-12 col-xl-6 p-l-30 o-hidden"><a class="h1href" href="#">
                    <h1 class="text-steelgray f-unisect">
                        @if ( function_exists('pll_the_languages') &&
                        pll_the_languages(array('raw'=>1))['en']['current_lang'])
                        PRODUCT
                        @else
                        SẢN PHẨM
                        @endif
                    </h1>
                </a>
                <hr class="afterh1">
                <p class="text-bluebayoux f-mavenpro p-t-40 p-b-20">
                    {{ get_theme_mod('setting_section_product_text_right') }}
                </p>
                <ul class="products-list">
                    @if (get_theme_mod('setting_section_product'))
                    @php
                    $index = 0;
                    @endphp
                    @foreach (get_theme_mod( 'setting_section_product') as $key => $item)
                    @php
                    $index++;
                    @endphp
                    @if ($index == 1)
                        @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                        <li class="box-ani slideInLeft">
                            <a href="javascript:;"
                                class="product-item product-item-0{{ $index }} active"><span class="product-item">
                                <img src="{{ get_template_directory_uri().'/assets/images/01.svg' }}"
                                alt="{{ $item['title_en'] }}">
                            </span>
                            <span class="product-item-title text-capitalize">{{ $item['title_en'] }}</span></a>
                        </li>
                        @else
                        <li class="box-ani slideInLeft">
                            <a href="javascript:;"
                                class="product-item product-item-0{{ $index }} active"><span class="product-item">
                                <img src="{{ get_template_directory_uri().'/assets/images/02.svg' }}"
                                alt="{{ $item['title'] }}">
                            </span>
                            <span class="product-item-title text-capitalize">{{ $item['title'] }}</span></a>
                        </li>
                        @endif
                    @else

                        @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                            <li class="box-ani slideInLeft"><a href="javascript:;"
                                    class="product-item product-item-0{{ $index }}"><span class="product-item">
                                        <img src="{{ get_template_directory_uri().'/assets/images/02.svg' }}"
                                            alt="{{ $item['title_en'] }}">
                                    </span><span class="product-item-title text-capitalize">{{ $item['title_en'] }}</span></a>
                            </li>
                        @else
                            <li class="box-ani slideInLeft"><a href="javascript:;"
                                    class="product-item product-item-0{{ $index }}"><span class="product-item">
                                        <img src="{{ get_template_directory_uri().'/assets/images/02.svg' }}"
                                            alt="{{ $item['title'] }}">
                                    </span><span class="product-item-title text-capitalize">{{ $item['title'] }}</span></a>
                            </li>
                        @endif
                    @endif
                    @endforeach
                    @else
                    <li class="box-ani slideInLeft"><a href="javascript:;"
                            class="product-item product-item-01 active"><span class="product-item"><img
                                    src="{{ get_template_directory_uri().'/assets/images/02.svg' }}" alt=""></span><span
                                class="product-item-title">Title</span></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>