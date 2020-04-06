<!DOCTYPE html>
<html {{ language_attributes() }} >
<!-- Mirrored from www.vng.com.vn/article/about/history.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Dec 2018 11:45:47 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="{{ bloginfo( 'charset' ) }}">
    <meta name="site" content="{{ bloginfo( 'name' ) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link href="{{ bloginfo('template_url') }}/assets/css/skin-subpage.min.css" rel="stylesheet" media="screen" />
    {{-- <link rel="StyleSheet" href="{{ bloginfo( 'template_url' ) }}/assets/css/ma5-menu.min.css"> --}}
    <link rel="StyleSheet" href="{{ bloginfo( 'template_url' ) }}/style.css">
    @include('components.blogs.style')
    {{-- hook wp header --}}

    {{ wp_head() }}

    {{-- end --}}
</head>
<body {{ body_class('') }}>

    @yield('content')

    {{ wp_footer() }}
</body>

</html>