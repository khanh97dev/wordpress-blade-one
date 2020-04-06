<footer class="s-footer bg-steelgray">
    <div class="container f-mavenpro">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-steelgray f-unisect text-center text-light">
                {{ get_theme_mod('setting_section_footer[title]', 'CÔNG TY TRÁCH NHIỆM HỮU HẠN LIÊN KẾT Y TẾ VIỆT') }}
                </h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 my-1 text-light">
                        <strong>
                            <i class="fa fa-address-book"></i>
                            @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                                Address:
                            @else
                                Địa Chỉ:
                            @endif
                        </strong>
                        @if(!empty(get_theme_mod('setting_section_footer')))
                        {{ get_theme_mod('setting_section_footer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, minima.')['dia_chi'] }}
                        @endif
                    </div>
                    <div class="col-md-4 col-12 my-1 text-light">
                        <strong>
                            <i class="fa fa-phone"></i>
                            @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                                Phone:
                            @else
                                Điện Thoại:
                            @endif
                        </strong>
                        <a class="text-supernova" href="tel: {{ get_theme_mod('setting_section_footer', '000')['dien_thoai'] }}">
                            @if(!empty(get_theme_mod('setting_section_footer')))
                            {{ get_theme_mod('setting_section_footer', '000')['dien_thoai'] }}
                            @endif
                        </a>
                    </div>
                    <div class="col-md-4 col-12 my-1 text-light">
                        <strong>
                            <i class="fa fa-fax"></i>
                            Fax:
                        </strong>
                        @if(!empty(get_theme_mod('setting_section_footer')))
                            {{ get_theme_mod('setting_section_footer', '000')['fax'] }}
                        @endif
                    </div>
                    <div class="col-md-4 col-12 my-1 text-light">
                        <strong>
                            @ Email:
                        </strong>
                        @if(!empty(get_theme_mod('setting_section_footer')))
                        <a class="text-supernova" href="mailto: {{ get_theme_mod('setting_section_footer', 'example@email.com')['email'] }}">
                            {{ get_theme_mod('setting_section_footer', 'example@email.com')['email'] }}
                        </a>
                        @else
                        <a class="text-supernova" href="mailto: email@email.com">
                            email
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="footer-copyright col-12 text-center my-1 text-light">
                Copyright &copy; {{ date('Y') }} <a class="text-supernova" href="{{ bloginfo('url') }}">{{ bloginfo('name') }}</a>. All right reserved.
            </div>
        </div>
    </div>
</footer>

