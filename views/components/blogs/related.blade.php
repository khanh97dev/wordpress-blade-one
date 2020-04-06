@php
    $posts = \Inc\Query\GuestQuery::relatedQueryCat()
@endphp
@if($posts)
<section class="s-sub bg-wildsand">
    <div class="container">
        <div class="posts-list">
            <h1 class="m-b-10">{{ __('Tin liên quan', TEXT_DOMAIN_THEME) }}</h1>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-12 col-md-6 col-xl-4"><a href="{{ the_permalink( $post->ID ) }}" title="{{ $post->post_title }}" class="news-item m-b-30 box-ani slideInUp" data-wow-delay="0.6s">
                            <div class="news-thumb">
                                <img src="{{ get_post_image_url( $post->ID ) }}" alt="{{ $post->post_title }}">
                            </div>
                            <div class="news-info">
                                <div class="news-date f-unisect-bold text-center text-selyellow m-b-10">{{ $post->post_date }}</div>
                                <div class="news-title f-mavenpro text-center text-shuttlegray m-b-10">
                                    {{ $post->post_title }}
                                </div>
                                <div class="news-content f-mavenpro text-center text-shuttlegray">
                                    {{ get_the_excerpt( $post->ID ) }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif