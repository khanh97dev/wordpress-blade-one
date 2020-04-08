@if($sidebar == 'content')

@elseif($sidebar == 'content')

@else
<div class="col-12 col-lg-3 sidebar">
    @php
    dynamic_sidebar( 'first-sidebar' )
    @endphp
</div>
@endif