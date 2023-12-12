<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="ngochieu22ad">
    @php
     $setting = App\Models\Setting::all()->first();
    @endphp
    @if ($setting)
    <link rel="shortcut icon" href="{{url('uploads/settings/'.$setting->favicon)}}" type="image/x-icon"> 
    @endif


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- styles --}}

    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />


    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    

</head>

<body>
    <div id="app">
        @include('layouts.inc.frontend-navbar')

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.inc.frontend-footer')

    </div>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    {{--
    <script src="{{asset('assets/js/scripts.js')}}" crossorigin="anonymous"></script> --}}
    {{--
    <script src="{{asset('assets/js/datatables-simple-demo')}}" crossorigin="anonymous"></script> --}}

    {{-- jquery --}}
    <script src="{{asset('assets/js/jquery-3.7.1.js')}}" crossorigin="anonymous"></script>
    {{-- carousel --}}
    <script src="{{asset('assets/js/owl.carousel.min.js')}}" crossorigin="anonymous"></script>
    <script>
        $('.category-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots:false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    @yield('scripts')
</body>

</html>