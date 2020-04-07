<!--[if IE 7]>
<html class="ie ie7" {{ language_attributes() }}>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" {{ language_attributes() }}>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html {{ language_attributes() }}>
<!--<![endif]-->
<head>
  <meta charset="{{ bloginfo( 'charset' ) }}">
  <meta name="viewport" content="width=device-width">
  <title>{{ wp_title( '|', true, 'right' ) }}</title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="{{ esc_url( get_bloginfo( 'pingback_url' ) ) }}">
  <!--[if lt IE 9]>
  <script src="{{ get_template_directory_uri() }}/js/html5.js?ver=3.7.0"></script>
  <![endif]-->
  @include('components.style')
  {{ wp_head() }}
</head>

<body {{ body_class() }}>
{{ wp_body_open() }}
<div id="page" class="hfeed site">
  @if ( get_header_image() )
  <div id="site-header">
    <a href="{{ esc_url( home_url( '/' ) ) }}" rel="home">
      <img src="{{ header_image() }}" width="{{ get_custom_header()->width }}" height="{{ get_custom_header()->height }}" alt="{{ esc_attr( get_bloginfo( 'name', 'display' ) ) }}">
    </a>
  </div>
  @endif

  <header id="masthead" class="site-header" role="banner">
    <div class="header-main">
      <h1 class="site-title"><a href="{{ esc_url( home_url( '/' ) ) }}" rel="home">{{ bloginfo( 'name' ) }}</a></h1>

      <div class="search-toggle">
        <a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container">{{ _e( 'Search', 'twentyfourteen' ) }}</a>
      </div>

      <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
        <button class="menu-toggle">{{ _e( 'Primary Menu', 'twentyfourteen' ) }}</button>
        <a class="screen-reader-text skip-link" href="#content">{{ _e( 'Skip to content', 'twentyfourteen' ) }}</a>
        @include('components.menu')
      </nav>
    </div>

    <div id="search-container" class="search-box-wrapper hide">
      <div class="search-box">
        {{ get_search_form() }}
      </div>
    </div>
  </header><!-- #masthead -->

  <div id="main" class="site-main">
