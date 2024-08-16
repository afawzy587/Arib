<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">
<link rel="stylesheet" href="{{ asset('vendors/css/ui/prism.min.css') }}">
{{-- Vendor Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}
@php
$configData = Helper::applClasses();
@endphp

@if(str_replace('_', '-', app()->getLocale()) == 'ar' )

        <link rel="stylesheet" href="{{ asset('css-rtl/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css-rtl/bootstrap-extended.css') }}">
        <link rel="stylesheet" href="{{ asset('css-rtl/colors.css') }}">
        <link rel="stylesheet" href="{{ asset('css-rtl/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css-rtl/themes/dark-layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css-rtl/themes/semi-dark-layout.css') }}">
        {{-- Layout Styles works when don't use customizer --}}

        @if($configData['theme'] == 'dark-layout')
        <link rel="stylesheet" href="{{ asset('css-rtl/themes/dark-layout.css') }}">
        @endif
        @if($configData['theme'] == 'semi-dark-layout')
        <link rel="stylesheet" href="{{ asset('css-rtl/themes/semi-dark-layout.css') }}">
        @endif
        {{-- Page Styles --}}
        @if($configData['mainLayoutType'] === 'horizontal')
        <link rel="stylesheet" href="{{ asset('css-rtl/core/menu/menu-types/horizontal-menu.css') }}">
        @endif
        <link rel="stylesheet" href="{{ asset('css-rtl/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" href="{{ asset('css-rtl/core/colors/palette-gradient.css') }}">
        {{-- Page Styles --}}
        @yield('page-style')
        {{-- Laravel Style --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/custom-laravel.css') }}"> --}}
        {{-- Custom RTL Styles --}}
        <link rel="stylesheet" href="{{ asset('css-rtl/custom-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/vendors-rtl.min.css') }}">

@else
        <link rel="stylesheet" href="{{ asset('vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-extended.css') }}">
        <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themes/dark-layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themes/semi-dark-layout.css') }}">
        {{-- Layout Styles works when don't use customizer --}}

        @if($configData['theme'] == 'dark-layout')
        <link rel="stylesheet" href="{{ asset('css/themes/dark-layout.css') }}">
        @endif
        @if($configData['theme'] == 'semi-dark-layout')
        <link rel="stylesheet" href="{{ asset('css/themes/semi-dark-layout.css') }}">
        @endif
        {{-- Page Styles --}}
        @if($configData['mainLayoutType'] === 'horizontal')
        <link rel="stylesheet" href="{{ asset('css/core/menu/menu-types/horizontal-menu.css') }}">
        @endif
        <link rel="stylesheet" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" href="{{ asset('css/core/colors/palette-gradient.css') }}">
        {{-- Page Styles --}}
        @yield('page-style')
        {{-- Laravel Style --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/custom-laravel.css') }}"> --}}
        {{-- Custom RTL Styles --}}
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endif
<link rel="stylesheet" href="{{ asset('css/plugins/forms/validation/form-validation.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('css/plugins/extensions/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('js/validation/formValidation.css') }}"> --}}
