<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/datatable/datatables.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/skin_color.css')}}">

    <link href="{{ asset('backend/assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style rel="stylesheet">
        /** Start Select2 Button Customization **/
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #e2e7f1 !important;
        }
        .select2-container .select2-selection--single {
            height: 38px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 7px !important;
        }
        .select2-dropdown {
            border: 1px solid #e2e7f1 !important;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #e2e7f1 !important;
        }
    </style>

    @yield('style')
</head>
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <div id="loader"></div>
        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
                    <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                </a>
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="logo">
                    <!-- logo-->
                    <div class="logo-lg">
                        <span class="light-logo"><img src="{{ asset('backend/images/logo-dark-text.png')}}" alt="logo"></span>
                        <span class="dark-logo"><img src="{{ asset('backend/images/logo-light-text.png')}}" alt="logo"></span>
                    </div>
                </a>
            </div>
            @include('backend.layouts.navbar');
        </header>
        @include('backend.layouts.sidebar');
        <div class="content-wrapper">
            <div class="container-full">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        @include('backend.layouts.footer');
        <div class="control-sidebar-bg"></div>
    </div>
    <div class="sticky-toolbar">
        <a href="#" data-toggle="tooltip" data-placement="left" title="Buy Now" class="waves-effect waves-light btn btn-success btn-flat mb-5 btn-sm" target="_blank">
            <span class="icon-Money"><span class="path1"></span><span class="path2"></span></span>
        </a>
        <a href="#" data-toggle="tooltip" data-placement="left" title="Portfolio" class="waves-effect waves-light btn btn-danger btn-flat mb-5 btn-sm" target="_blank">
            <span class="icon-Image"></span>
        </a>
        <a id="chat-popup" href="#" data-toggle="tooltip" data-placement="left" title="Live Chat" class="waves-effect waves-light btn btn-warning btn-flat btn-sm">
            <span class="icon-Group-chat"><span class="path1"></span><span class="path2"></span></span>
        </a>
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('backend/assets/js/vendors.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/pages/chat-popup.js')}}"></script>
    <script src="{{ asset('backend/assets/icons/feather-icons/feather.min.js')}}"></script>

    <script src="{{ asset('backend/assets/vendor_components/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor_components/fullcalendar/fullcalendar.js')}}"></script>
    <!-- EduAdmin App -->
    <script src="{{ asset('backend/assets/js/template.js')}}"></script>
    <!-- Toast Plugin JS -->
    <script src="{{ asset('backend/assets/js/toast_plugin.js')}}"></script>
    <script src="{{ asset('backend/assets/js/select2.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/pages/dashboard3.js')}}"></script>
    <script src="{{ asset('backend/assets/js/pages/calendar.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor_components/dropzone/dropzone.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var message = '{{ session('message') }}';
            var error = '{{ session('error') }}';

            if (!window.performance || window.performance.navigation.type != window.performance.navigation.TYPE_BACK_FORWARD) {
                toastr.options = {
                    "progressBar" : true,
                    "closeButton" : true
                }

                if (error == 'false') {
                    toastr.success("{{ Session::get('message') }}", 'Success!', {timeOut:6000});
                }

                if (error == 'true') {
                    toastr.error("{{ Session::get('message') }}", 'Error Found!', {timeOut:6000});
                }
            }
        });
    </script>
    @yield('script')
</body>
</html>
