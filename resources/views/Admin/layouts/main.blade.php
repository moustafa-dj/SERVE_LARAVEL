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
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')

   <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
       @yield('content')
    </section>

  </main><!-- End #main -->
  @include('admin.layouts.footer')
</body>
