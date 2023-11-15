
@php
use Illuminate\Support\Facades\Request;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <title>welcome  {{$adminData->nom}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">HERCULES</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('storage/storage/' . $adminData->image) }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ $adminData->nom }} {{ $adminData->prenom }}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link{{ Request::is('admin/dashboard') ? ' active' : '' }}"><i class="fa fa-home me-2"></i>Dashboard</a>
                <a href="{{ route('admin.addCoach') }}" class="nav-item nav-link{{ Request::is('admin/addCoach') ? ' active' : '' }}"><i class="fa fa-plus me-2"></i>add  coach</a>
                <a href="{{ route('admin.addUser') }}" class="nav-item nav-link{{ Request::is('admin/addUser') ? ' active' : '' }}"><i class="fa fa-plus me-2"></i>Add  user</a>
                <a href="{{ route('admin.addSalle') }}" class="nav-item nav-link{{ Request::is('admin/addSalle') ? ' active' : '' }}"><i class="fa fa-plus me-2"></i>Add Salle</a>
                <a href="{{ route('admin.addSport') }}" class="nav-item nav-link{{ Request::is('admin/addSport') ? ' active' : '' }}"><i class="fa fa-plus me-2"></i>add sport</a>
                <a href="{{ route('admin.abonnements') }}" class="nav-item nav-link{{ Request::is('admin/abonnements') ? ' active' : '' }}"><i class="fa fa-user me-2"></i>abonnements</a>
                <a href="{{ route('admin.seance') }}" class="nav-item nav-link{{ Request::is('admin/seance') ? ' active' : '' }}"><i class="fa fa-user me-2"></i>seance</a>

            </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="{{ route('admin.dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                <input id="searchInput" class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    
                <div class="nav-item dropdown">
                        @include('admin.noti')
                    </div>


                    <div class="nav-item dropdown">
                        <a href="{{'profile'}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle" src="{{ asset('storage/storage/' . $adminData->image) }}" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{$adminData->nom}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{'profile'}}" class="dropdown-item">My Profile</a>
                            <a href="{{ route('logout') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
