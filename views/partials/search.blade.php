@php
    $something = get_theme_mod('something', 'value default')
@endphp
@extends('layout.default')
@section('content')
@if ($something)
<p>
  {{ $something }}
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, et odit esse sequi nisi labore aliquid doloribus totam neque laborum eius quidem asperiores reprehenderit veniam, dolor delectus hic soluta nam?
</p>
@endif
@endsection