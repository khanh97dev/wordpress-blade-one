<!DOCTYPE html>
<html {{ language_attributes() }} >

<head>
    <meta charset="{{ bloginfo( 'charset' ) }}">
    <meta name="site" content="{{ bloginfo( 'name' ) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('components.homepages.style')

    @stack('styles')
    {{ wp_head() }}
</head>
<body {{ body_class('') }}>
    @yield("content")
    {{ wp_footer() }}
    @stack('scripts')
</body>

</html>