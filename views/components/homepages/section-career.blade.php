<!-- Section Career -->
<style scoped>
    section.s-career{
        position: relative;
    }
    section.s-career::after {
        z-index: -1;
        content: '';
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        background: url({{ get_theme_mod('setting_section_career', 'https://img.zing.vn/products/vng/skin-2018/images/bg/scareer.jpg')['img'] }}) center center no-repeat;
        background-attachment: fixed;
        background-size: cover;
        overflow: hidden;
        filter: brightness(0.25);
    }
</style>
<section class="s-career">
    <div class="container text-center">
        <h1 class="text-supernova editable f-unisect text-center box-ani slideInDown">
            @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                CAREER OPPORTUNITIES
            @else
                CƠ HỘI NGHỀ NGHIỆP
            @endif
        </h1>
        <p class="text-silver f-mavenpro p-t-20 container m-auto text-center box-ani slideInDown">
            @if ( get_theme_mod('setting_section_career')['content_en'] && function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                {{ get_theme_mod('setting_section_career')['content_en'] }}
            @elseif( get_theme_mod('setting_section_career')['content_vi'])
                {{ get_theme_mod('setting_section_career')['content_vi'] }}
            @else
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis eos molestias dignissimos rem.
            @endif
        </p>
        <a href="
            @if ( get_theme_mod('setting_section_career')['link_en']  && function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                {{ get_theme_mod('setting_section_career', '#')['link_en'] }}
            @elseif(get_theme_mod('setting_section_career', '#')['link'])
                {{ get_theme_mod('setting_section_career', '#')['link'] }}
            @else
                #
            @endif
            "
            class="bt bt-lg bt-supernova bt-o-secondary f-40 f-mavenpro p-h-80 p-v-30 m-t-40 m-b-30 box-ani slideInUp">
            @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                IMMEDIATE APPLICATION
            @else
                ỨNG TUYỂN NGAY
            @endif
            </a>
    </div>
</section>
<!-- .Section Career -->