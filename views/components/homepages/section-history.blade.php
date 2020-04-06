<section class="s-history bg-light">
    <div class="container"><a class="h1href" href="#">
            <h1 class="text-steelgray f-unisect text-center">
                @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                    THE PROCESS OF FORMATION AND DEVELOPMENT
                @else
                    QUÁ TRÌNH HÌNH THÀNH VÀ PHÁT TRIỂN
                @endif
            </h1>
        </a>
        <hr class="afterh1 hr-center">
        <div class="timeline">
            <ul class="timeline-above">
                <li><img src="//corp.vcdn.vn/products/vng/skin-2018/images/history/1.png" alt=""></li>
                <li><img src="//corp.vcdn.vn/products/vng/skin-2018/images/history/2.png" alt=""></li>
                <li><img src="//corp.vcdn.vn/products/vng/skin-2018/images/history/3.png" alt=""></li>
                <li><img src="//corp.vcdn.vn/products/vng/skin-2018/images/history/5.png" alt=""></li>
                <li><img src="//corp.vcdn.vn/products/vng/skin-2018/images/history/6.png" alt=""></li>
            </ul>
            <ul>
                @for ($i = 1; $i <= 5; $i++)
                    @if($i == 1)
                        <li class="active"><a href="javascript:;"
                                class="history-item history-item-0{{ $i }}"><strong>{{ get_theme_mod("setting_section_history_title_$i", '2015') }}</strong><br>
                                <div>{{ get_theme_mod("setting_section_history_year_$i"."_frist", '2015') }}
                                    <span>-</span>
                                    {{ get_theme_mod("setting_section_history_year_$i"."_secondary", '2015') }}</div>
                            </a>
                        </li>
                    @elseif($i >= 4)
                        <li><a href="javascript:;"
                                class="history-item history-item-0{{ $i+1 }}"><strong>{{ get_theme_mod("setting_section_history_title_$i", '2015') }}</strong><br>
                                <div>{{ get_theme_mod("setting_section_history_year_$i"."_frist", '2015') }}
                                    <span>-</span>
                                    {{ get_theme_mod("setting_section_history_year_$i"."_secondary", '2015') }}</div>
                            </a>
                        </li>
                    @else
                        <li><a href="javascript:;"
                                class="history-item history-item-0{{ $i }}"><strong>{{ get_theme_mod("setting_section_history_title_$i", '2015') }}</strong><br>
                                <div>{{ get_theme_mod("setting_section_history_year_$i"."_frist", '2015') }}
                                    <span>-</span>
                                    {{ get_theme_mod("setting_section_history_year_$i"."_secondary", '2015') }}</div>
                            </a>
                        </li>
                    @endif
                @endfor
            </ul>
        </div>
        <div class="swiper-container history-container">
            <div class="swiper-wrapper">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="swiper-slide">
                            @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                                <div class="history-title f-unisect-bold text-center text-steelgray f-30">
                                    {{ get_theme_mod("setting_section_history_title_en_$i", '2015') }}
                                </div>
                                <p class="history-content f-mavenpro text-steelgray text-center">
                                    {{ get_theme_mod("setting_section_history_content_en_$i", '2015') }}
                                </p>
                            @else
                                <div class="history-title f-unisect-bold text-center text-steelgray f-30">
                                    {{ get_theme_mod("setting_section_history_title_vi_$i", '2015') }}
                                </div>
                                <p class="history-content f-mavenpro text-steelgray text-center">
                                    {{ get_theme_mod("setting_section_history_content_vi_$i", '2015') }}
                                </p>
                            @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>