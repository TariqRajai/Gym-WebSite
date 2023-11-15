
@php
use Illuminate\Support\Facades\Request;
@endphp
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1 class="logo"><a  href="{{'/'}}">HERCULES</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ Request::is('/') ? ' active' : '' }}" href="{{'/'}}">Home</a></li>
          <li><a class="nav-link scrollto {{ Request::is('/#About') ? ' active' : '' }}" href="{{'/#About'}}">About</a></li>
          <li><a class="nav-link scrollto {{ Request::is('trainer') ? ' active' : '' }}" href="{{'trainer'}}">Trainers</a></li>
          <li><a class="nav-link scrollto {{ Request::is('classes') ? ' active' : '' }}" href="{{'classes'}}">Classes</a></li>
          <li><a class="nav-link scrollto {{ Request::is('registration') ? ' active' : '' }}" href="{{'registration'}}">Sign Up</a></li>
          <li><a class="nav-link scrollto {{ Request::is('login') ? ' active' : '' }}" href="{{'login'}}">Login</a></li>
          <li><a class="nav-link scrollto {{ Request::is('contactUs') ? ' active' : '' }}" href="{{'contactUs'}}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->