<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Client Register</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" action = "{{ route('client.login')}}" method = "POST" novalidate>

                  @csrf
                    <div class="col-12">
                        <label for="yourUsername" class="form-label">Name</label>
                        <div class="input-group has-validation">
                            <input type="name" name="name" 
                                class="form-control @error('name') is-invalid @enderror" id="name" required>
                            @error('name')
                                <div class="invalid-feedback">{{$message}}.</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" 
                        class="form-control @error('email') is-invalid @enderror" id="email" required>
                        @error('email')
                            <div class="invalid-feedback">{{$message}}.</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" 
                      class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                        @error('password')
                            <div class="invalid-feedback">{{$message}}.</div>
                        @enderror
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                      <p class="small mb-0">You have account? <a href="{{route('client.login')}}">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="credits">
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<body>

  <!-- Vendor JS Files -->  
  <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('admin/assets/js/main.js') }}" type="text/javascript"></script>

  <!-- Template Main JS File -->