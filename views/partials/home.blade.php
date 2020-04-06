@extends('layout.home')

@section('content')
    @include('components.homepages.navigation')

    @include('components.homepages.header')

    @if (get_theme_mod('setting_section_number_visible'))
        @include('components.homepages.section-number')
    @endif

    @if (get_theme_mod('setting_section_products_visible'))
        @include('components.homepages.section-products')
    @endif

    @if (get_theme_mod('setting_section_about_visible'))
        @include('components.homepages.section-about')
    @endif

    @if (get_theme_mod('setting_section_history_visible'))
        @include('components.homepages.section-history')
    @endif

    @include('components.homepages.section-news')

    @if (get_theme_mod('setting_section_career_visible'))
        @include('components.homepages.section-career')
    @endif

    @if (get_theme_mod('setting_section_partner_visible'))
        @include('components.homepages.section-partner')
    @endif

    @include('partials.footer')

    @include('components.homepages.script')

    @include('partials.script')
@endsection


@push('scripts')
<script>
    const VueTest = new Vue({
      el: '#something',
        data: () => {
          return {
            something: 'text something'
          }
        }
    })
</script>
@endpush