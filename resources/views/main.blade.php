<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>{{$title}} - SIMTA</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicons -->
        <link href="" rel="icon">
        <link href="" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/daterangepicker/datepicker.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/daterangepicker/daterangepicker.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/jquery.datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/daterangepicker/datepicker.min.css')}}">
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/select2/select2.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/daterangepicker/datepicker.min.css')}}">

        <!-- Vendor JS Files -->
        <script src="{{asset('assets/js/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/id.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="{{asset('assets/daterangepicker/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('assets/js/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('assets/sweetalert2/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('assets/highchart/highcharts.js')}}"></script>
    
        <script type="text/javascript" src="{{asset('assets/daterangepicker/daterangepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/daterangepicker/datepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/daterangepicker/bootstrap-datepicker.js')}}"></script>
        <link href="{{asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
        <script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/js/index.global.min.js')}}"></script>
        <script src="{{asset('assets/select2/select2.min.js')}}"></script>
    
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    
        <script>
            $(document).ready(function() {
                var url = window.location.href;
                var urlsplit = url.split('/');
                var urlget = urlsplit[3];
                $(document).ajaxStart(function() {
                    if (urlget.includes("controlprosess") != true) {
                        $(".preload-wrapper").css("display", "block");
                    }
                });
                $(document).ajaxComplete(function() {
                    if (urlget.includes("controlprosess") != true) {
                        $(".preload-wrapper").css("display", "none");
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="preload-wrapper">
            <div class="spinner-border text-danger" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        {{-- Header --}}
        @include('Template.header')
        {{-- Sidebar --}}
        @include('Template.sidebar')

        {{-- Content --}}
        @yield('content')

        {{-- Footer --}}
        @include('Template.footer')

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>