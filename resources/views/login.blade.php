<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Form Login SIMTA</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="" rel="icon">
        <link href="" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

        <!-- Vendor JS Files -->
        <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </head>

    <body>
        <main>
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <div class="d-flex justify-content-center py-4">
                                    <a href="" class="logo d-flex align-items-center w-auto">
                                        <img src="{{asset('pictures/lgo-login.png')}}" alt="" style="max-width: 100%;max-height: 100%;">
                                    </a>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">SIMTA</h5>
                                            <p class="text-center">Sistem Informasi Monitoring Tugas Akhir</p>
                                        </div>

                                        <form class="row g-3 needs-validation" action="{{route('login_post')}}" method="POST">
                                            @csrf

                                            <div class="col-12">
                                                <label for="yourUsername" class="form-label">NIP/NIM/</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id=""><i class="bi bi-person"></i></span>
                                                    <input type="text" name="nik" class="form-control" id="yourUsername" required>
                                                    <div class="invalid-feedback">Please enter your NIP/NIM.</div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Password</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id=""><i class="bi bi-key-fill"></i></span>
                                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Login</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="credits">
                                    &copy; {{date('Y')}} Naliyadivani
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        
    </body>
</html>
