@php
echo wp_nav_menu(
  array(
    'theme_location' => 'primary',
    'menu_class'     => 'nav-menu',
    'menu_id'        => 'primary-menu',
  )
);
@endphp