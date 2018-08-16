<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('css/plugins/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/simple-line-icons/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/pace/themes/custom/custom-pace.css') }}">
        <!-- endinject -->

        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('css/plugins/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
        <!-- End plugin css for this page -->

        <!-- App Compilled Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Dashboard Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

        @yield('style')
        
    </head>

    <body>
        <div id="app">
            <main>
                <!-- container-scroller -->
                <div class="container-scroller">
                    <div class="container-fluid page-body-wrapper">
                        <div class="row row-offcanvas row-offcanvas-right">
                            <!-- Page content -->
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- plugins:js -->
    <script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('js/custom/misc.js') }}"></script>
    <!-- endinject -->

    @yield('js')

</html>