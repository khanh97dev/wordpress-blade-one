<header class="s-header">
    <div class="container">
        <div class="pagename text-upper">
            @if (is_archive())
                {{ the_archive_title() }}
            @else
                {{ the_title() }}
            @endif
        </div>
        <div class="breadscrum">
            <ul id="breadcrumbs">
                <li itemprop="url" itemprop=&#039;child&#039;>
                    <a href="{{ bloginfo('url') }}" itemprop="url" rel=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
                            <g id="home">
                                <polygon points="204,471.75 204,318.75 306,318.75 306,471.75 433.5,471.75 433.5,267.75 510,267.75 255,38.25 0,267.75     76.5,267.75 76.5,471.75   " fill="#FFFFFF" />
                            </g>
                        </svg><span class="breadscrum-item">
                            @if (function_exists('pll_the_languages') && pll_the_languages(array('raw'=>1))['en']['current_lang']){{ __('Home page', TEXT_DOMAIN_THEME) }}@else{{ __('Trang chủ', TEXT_DOMAIN_THEME) }}@endif
                        </span>
                    </a>
                </li>
                @if (is_archive())
                    <li itemprop="url" itemprop=&#039;child&#039;><a href="#" itemprop="url" rel=""><span class="breadscrum-item">{{ single_cat_title() }}</span></a></li>
                @elseif(is_single())
                    <li itemprop="url" itemprop=&#039;child&#039;><a href="{{ get_category_link( get_the_category()[0]->term_id )  }}" itemprop="url" rel=""><span class="breadscrum-item">{{ get_the_category()[0]->name }}</span></a></li>
                    <li itemprop="url" itemprop=&#039;child&#039;><a href="#" itemprop="url" rel=""><span class="breadscrum-item">{{ the_title() }}</span></a></li>
                @else
                    <li itemprop="url" itemprop=&#039;child&#039;><a href="#" itemprop="url" rel=""><span class="breadscrum-item">{{ the_title() }}</span></a></li>
                @endif
            </ul>
        </div>
    </div>
</header>