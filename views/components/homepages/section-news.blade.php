<section class="s-news bg-wildsand o-hidden">
    <input type="hidden" id='itemTotal' value="22">
    <input type="hidden" id='itemPerPage' value="4">
    <div class="container">
        <a class="h1href container-editor">
            <h1 class="text-shuttlegray text-editor f-unisect text-center">
                @if ( function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang'])
                    {{ get_theme_mod( 'setting_section_news_title_en', 'NEWS &amp; EVENT') }}
                @else
                    {{ get_theme_mod( 'setting_section_news_title_vi', 'TIN TỨC &amp; SỰ KIỆN') }}
                @endif
            </h1>
        </a>
        <hr class="afterh1 hr-center">
    </div>
    <div class="container-fluid p-b-30">
        <div class="row">
            {{ Inc\Query\GuestQuery::homeNews() }}
        </div>
    </div>
</section>