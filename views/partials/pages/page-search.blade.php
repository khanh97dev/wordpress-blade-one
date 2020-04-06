@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="list-group">
            @while (have_posts()) {{ the_post() }}
            <a href="{{ the_permalink() }}" class="list-group-item list-group-item-action list-group-item-primary">{{ the_title() }}</a>
            @endwhile
        </div>
    </div>
@endsection