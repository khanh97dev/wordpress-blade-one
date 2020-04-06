@extends('layouts.blogs')
@section('main')
<div class="wrapper">
    <section class="s-sub bg-wildsand">
        <div class="container">
            <div class="posts-list" id="posts__contain">
                <div class="row" id="result-load-more">
                    @while (have_posts()) {{ the_post() }}
                        @include('templates.archive')
                    @endwhile
                @php
                    global $wp_query;
                @endphp
            </div> {{-- .row --}}
            <div class="col-12 text-center">
                <a href="#" data-page="1" data-url="{{ admin_url( 'admin-ajax.php' ) }}" data-archive="{{ single_cat_title() }}" class="bt bt-tango" id="bt-loadmore">
                    XEM THÊM
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <path d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,480
                        C132.288,480,32,379.712,32,256S132.288,32,256,32s224,100.288,224,224S379.712,480,256,480z" />
                        <path d="M219.2,116.8l-22.56,22.56L313.44,256L196.8,372.8l22.56,22.56l127.84-128c6.204-6.241,6.204-16.319,0-22.56L219.2,116.8
                        z" />
                    </g>
                </svg></a>
            </div>
        </div><!-- block paging subpage--><!-- block paging subpage-->
    </div>{{-- .wrapper --}}
</section>
</div>
@endsection
@push('script')
<script>
    jQuery(document).ready(function($) {
        var btLoadmore = jQuery('#bt-loadmore');
        var countPost = {{ $wp_query->post_count }} // count post display
        var page = btLoadmore.data('page') + 1;
        var maxPost = {{ $wp_query->found_posts }} // total post current in archive
        var totalPages = {{ $wp_query->max_num_pages }} // total page current in archive
        function checkBtLoadmore(){
            if(countPost >= maxPost){
                return btLoadmore.hide();
            }
            return btLoadmore.fadeIn();
        }
        // use function
        checkBtLoadmore();

        btLoadmore.on('click', function(event) {
            event.preventDefault();
            var that = jQuery(this)
            var archive = that.data('archive')
            var url = that.data('url')
            $.ajax({
                url : url,
                data: {
                    page: page,
                    action: 'load_more',
                    archive: archive
                },
                error: function(response){
                    console.log('error', response)
                },
                success: function(response){
                    console.log('totalPages', totalPages);
                    console.log('success', response);
                    jQuery('#result-load-more').append(response)
                    if(page >= totalPages){
                        that.fadeOut()
                    }
                    page++;
                },
            })
        });
    });
</script>
@endpush