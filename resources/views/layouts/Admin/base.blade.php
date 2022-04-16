<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="stylesheet" id="css-main" href="@yield('css_file')">
    <title>IVOIRJOB ADMIN | @yield('Page_Title')</title>
</head>
<body>
    @auth('administrateur')

        <div id="page-container" class="sidebar-o  side-scroll page-header-fixed main-content-narrow">
        @include('layouts.Admin.header') <!--Include Page Header-->
        @include('layouts.Admin.aside')  <!--Include Page Aside-->
        @yield('ContentAdmin')                   <!--Include Page Content-->
        </div>

        {{--JS STATIC FILLES--}}
        <script src = "{{asset('assets/js/Deconnexion.js')}}"></script>
        <script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>
        <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/be_tables_datatables.min.js')}}"></script>
        {{--JS STATIC FILES END--}}


    @endauth
</body>
</html>