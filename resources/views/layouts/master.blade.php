<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Blog ', 'Blog Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- style --}}
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
  
    {{--Summernote editor css  --}}
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css')}}" rel="stylesheet" />
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css')}}" rel="stylesheet" />

    {{-- datatable css --}}
    
    <link href="{{asset('//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
   
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
       .dataTables_paginate .paginate_button  {
        padding: 0px !important;
        margin: 0px !important;
       }
       div.dataTables_wrapper div.dataTables_length select{
        width: 50% !important; 
       }

       .post-code-bg {
          
            min-width: 100%;
            background-color: #1e1e1e !important;
            width: 100% !important;
            overflow-x: scroll !important;
            position: relative;
            padding: 1rem 1rem;
            margin-bottom: 1em;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            /* width: fit-content !; */
            word-break: break-all !important;
        }
    </style>

</head>
<body>
    @include('layouts.inc.admin-navbar')
    <div id="layoutSidenav">
        @include('layouts.inc.admin-sidebar')
 
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
    </div>
</div>
    @include('layouts.inc.admin-footer')
    

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/scripts.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/datatables-simple-demo')}}" crossorigin="anonymous"></script>

      <script src="{{asset('assets/js/jquery-3.7.1.js')}}" crossorigin="anonymous"></script>
     {{--Summernote editor js  --}}
     <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js')}}" crossorigin="anonymous"></script>
     <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js')}}" crossorigin="anonymous"></script>

    
    <script>
        $(document).ready(function() {
        $("#mySummernote").summernote({
            height:250,
        });
        $('.dropdown-toggle').dropdown();
        });
    </script>

     {{-- datatable js --}}
     <script src="{{asset('//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function()
        {
            $('#myDataTable').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
@yield('scripts')

</body>
</html>
