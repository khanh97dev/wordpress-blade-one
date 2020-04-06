<!-- Section Number -->
<style scoped>

    section.s-numbers{
        position: relative;
    }
    section.s-numbers::after {
        content: '';
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        z-index: -1;
        background: url({{ bloginfo('template_url').'/assets/images/section-number.jpg' }}) bottom center no-repeat;
        width: 100%;
        background-attachment: fixed;
        background-size: cover;
        filter: brightness(0.5);
    }
</style>
<section class="s-numbers">
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="number-circle">
                    <div class="number-circle-inner"><span class="number-circle-normal number-circle-1" data-incto="{{ get_theme_mod('setting_section_number_1', 1000) }}"></span></div>
                </div>
                <div class="label f-mavenpro text-light text-center">
                    <strong>
                        @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang']) BILLION @else TỶ @endif
                    </strong>
                    <br> {{ get_theme_mod('setting_section_text_1', '2013 - 2018') }}
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="number-circle">
                    <div class="number-circle-inner"><span class="number-circle-normal number-circle-2" data-incto="{{ get_theme_mod('setting_section_number_2', 1000) }}"></span></div>
                </div>
                <div class="label f-mavenpro text-light text-center">
                    <strong>
                        @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang']) YEARS @else NĂM @endif
                    </strong>
                    <br> {{ get_theme_mod('setting_section_text_2', '2013 - 2018') }}
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="number-circle">
                    <div class="number-circle-inner"><span class="number-circle-normal number-circle-3" data-incto="{{ get_theme_mod('setting_section_number_3', 1000) }}"></span></div>
                </div>
                <div class="label f-mavenpro text-light text-center">
                    <strong>
                        @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang']) OFFICE @else VĂN PHÒNG @endif
                    </strong>
                    <br> {{ get_theme_mod('setting_section_text_3', '2013 - 2018') }}
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="number-circle">
                    <div class="number-circle-inner"><span class="number-circle-normal number-circle-4" data-incto="{{ get_theme_mod('setting_section_number_4', 1000) }}"></span></div>
                </div>
                <div class="label f-mavenpro text-light text-center">
                    <strong>
                        @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang']) GROUP @else NHÓM @endif
                    </strong>
                    <br> {{ get_theme_mod('setting_section_text_4', '2013 - 2018') }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- .Section Number -->