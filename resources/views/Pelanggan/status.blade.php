@extends('app')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets2/img/favicon.png" rel="icon">
  <link href="../assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets2/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets2/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Laundry SMKN 1</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="../assets2/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('home') }}">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>

          <li class="dropdown"><a href="#"><span>Servis</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('pelanggan.status') }}">Check Status</a></li>
              <li><a href="#">Pencucian 2</a></li>
              <li><a href="#">Pencucian 3</a></li>
              <li><a href="#">Pencucian 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li><a class="nav-link scrollto" href="{{ route('logout') }}">Log Out</a></li>
          <li><a class="getstarted dropdown" href="{{ route('login') }}"><b>{{ Auth::user()->name }}</b></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <h2>Status Pemesanan</h2>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Pemesan</th>
                <th>Jenis Cucian</th>
                <th>Status</th>
                <th>Tanggal Pemesanan</th>
                <th>Berat</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data_pesanan as $pesanan)
              <tr>
                <td>{{ $pesanan->user_name }}</td>
                <td>{{ $pesanan->jenis_cucian }}</td>
                <td>{{ $pesanan->status }}</td>
                <td>{{ $pesanan->tanggal_pemesanan }}</td>
                <td>{{ $pesanan->berat }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

</body>

</html>
