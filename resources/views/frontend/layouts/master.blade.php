<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="{{ config('app.name') }} | Corporate Finance & Content Analytics" />
    <meta name="keywords" content="advisor,corporate,business,accountant,consulting,finance,financial,insurance,trading" />
    <meta name="author" content="ThemeMascot" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <link href="{{ asset('frontend/assets/images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset('frontend/assets/images/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('frontend/assets/mages/apple-touch-icon-72x72.png') }}i" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ asset('frontend/assets/images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ asset('frontend/assets/images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">
    {{--    {{ asset('frontend/assets/') }}       --}}
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/css/css-plugin-collections.css') }}" rel="stylesheet" />

    <link id="menuzord-menu-skins" href="{{ asset('frontend/assets/css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/style-main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/css/preloader.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/colors/theme-skin-color-set2.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('frontend/assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('backend/assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('frontend/assets/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('style')
</head>

<body class>
    <div id="wrapper" class="clearfix">
        <div id="preloader">
            <div id="spinner">
                <div class="preloader-dot-loading">
                    <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                </div>
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>

        @include('frontend.layouts.header')

        <div class="main-content">
            @yield('content')
        </div>

        @include('frontend.layouts.footer')
    </div>

    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>
    <!-- Toast Plugin JS -->
    <script src="{{ asset('backend/assets/js/toast_plugin.js')}}"></script>
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
