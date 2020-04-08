@extends('layouts.blogs')

@section('main')
<div class="wrapper">
  <section class="s-sub bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-9">
          {{ the_post() }}
          <div class="article-title">
            <h2 class="post-title">{{ the_title() }}</h2>
            <div class="date"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                  <path d="M452,40h-24V0h-40v40H124V0H84v40H60C26.916,40,0,66.916,0,100v352c0,33.084,26.916,60,60,60h392
                    c33.084,0,60-26.916,60-60V100C512,66.916,485.084,40,452,40z M472,452c0,11.028-8.972,20-20,20H60c-11.028,0-20-8.972-20-20V188
                    h432V452z M472,148H40v-48c0-11.028,8.972-20,20-20h24v40h40V80h264v40h40V80h24c11.028,0,20,8.972,20,20V148z" />
                </g>
                <g>
                  <rect x="76" y="230" width="40" height="40" />
                </g>
                <g>
                  <rect x="156" y="230" width="40" height="40" />
                </g>
                <g>
                  <rect x="236" y="230" width="40" height="40" />
                </g>
                <g>
                  <rect x="316" y="230" width="40" height="40" />
                </g>
                <g>
                  <rect x="396" y="230" width="40" height="40" />
                </g>
                <g>
                  <rect x="76" y="310" width="40" height="40" />
                </g>
                <g>
                  <rect x="156" y="310" width="40" height="40" />
                </g>
                <g>
                  <rect x="236" y="310" width="40" height="40" />
                </g>
                <g>
                  <rect x="316" y="310" width="40" height="40" />
                </g>
                <g>
                  <rect x="76" y="390" width="40" height="40" />
                </g>
                <g>
                  <rect x="156" y="390" width="40" height="40" />
                </g>
                <g>
                  <rect x="236" y="390" width="40" height="40" />
                </g>
                <g>
                  <rect x="316" y="390" width="40" height="40" />
                </g>
                <g>
                  <rect x="396" y="310" width="40" height="40" />
                </g>
              </svg>
              {{ the_date() }}
            </div>
          </div>
          <article style="padding-top: 20px;">
            {{ the_content() }}
            @if (has_tag())
            <div class="tag">
              {{ __( 'Tags', TEXT_DOMAIN_THEME ) }}
            </div>
            <div class="tag-list">
              {{ the_tags('') }}
            </div>
            @endif
          </article>
        </div>
        @include('components.blogs.sidebar')
      </div>
    </div>
  </section>
  @include('components.blogs.related')
</div>
@endsection