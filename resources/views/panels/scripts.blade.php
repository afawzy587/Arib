    {{-- Vendor Scripts --}}
        <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
        <script src="{{ asset('vendors/js/ui/prism.min.js') }}"></script>
        @yield('vendor-script')
        {{-- Theme Scripts --}}
        <script src="{{ asset('js/core/app-menu.js') }}"></script>
        <script src="{{ asset('js/core/app.js') }}"></script>
        <script src="{{ asset('js/scripts/components.js') }}"></script>
        <script src="{{ asset('js/validation/formValidation.js') }}"></script>
        @if($configData['blankPage'] == false)
                <script src="{{ asset('js/scripts/footer.js') }}"></script>
        @endif
       <script src="{{ asset('js/validation/framework/bootstrap.js') }}"></script>
       <script src="{{ asset('vendors/js/extensions/toastr.min.js') }}"></script>
{{-- <script src="{{ asset('/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
        <script src="{{ asset('js/scripts/forms/validation/form-validation.js') }}"></script> --}}
       <script src="{{ asset('js/admin.js?v='.time()) }}"></script>
        {{-- page script --}}
        @yield('page-script')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/polyfill.min.js') }}"></script>

