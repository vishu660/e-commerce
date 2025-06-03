
@php
    use App\Http\Controllers\ProductController;
    $total = 0;
    if (Auth::check()) {
        $total = ProductController::cartItemCount();
    }
@endphp


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-commerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


  <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
  

</head>
<body class="d-flex flex-column min-vh-100">

{{-- Header --}}
<header class="p-3">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between">

      {{-- Logo --}}
      <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
        <i class="fas fa-store me-2"></i> e_commerce
      </a>

      {{-- Navigation --}}
      <ul class="nav me-auto">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="{{ route('product12') }}" class="nav-link">Mobile</a></li>
        <li class="nav-item"><a href="{{ route('product13') }}" class="nav-link">Electronics</a></li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
      </ul>

      {{-- Search + Flag + Profile + Cart --}}
      <form action="{{ route('search') }}" method="GET" class="d-flex align-items-center gap-3">
         <div class="d-flex align-items-center gap-3">
        {{-- Search --}}
        <div class="position-relative">
          <input type="search" name="query" class="form-control pe-5 search-box" placeholder="Search..." aria-label="Search">
          <i class="fas fa-search search-icon-end"></i>
        </div>
      </form>

        {{-- Country Flag --}}
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <img src="https://flagcdn.com/w40/in.png" width="20" alt="India"> IN
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/us.png" width="20"> US</a></li>
            <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/gb.png" width="20"> UK</a></li>
            <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/w40/fr.png" width="20"> France</a></li>
          </ul>
        </div>

        {{-- Profile --}}
        <div class="dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fas fa-user-circle fa-lg"></i>
          </a>
          @if (Auth::check())
            <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

          </ul>
          
          @else
           <ul class="dropdown-menu dropdown-menu-end">
           
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
           

          </ul>
              
         
         
           @endif
        </div>

        {{-- Cart --}}
        <div class="d-flex align-items-center">
                       <div style="position: relative; display: inline-block;">
                        
                          <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart fa-lg"></i>
                           <span class="cart-badge">{{ $total }}</span>
                           </a>
                   </div>
        </div>
      </div>
    </div>
  </div>
</header>

{{-- Content --}}
<main class="flex-fill">
  @yield('content')
</main>

{{-- Footer --}}
<footer class="bg-white text-lg-start border-top mt-auto">
  <div class="container p-4">
    <div class="row">
      {{-- About --}}
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-3">e_commerce</h5>
        <p>
          One-stop solution for all your shopping needs. Quality products, great deals and fast delivery.
        </p>
      </div>

      {{-- Quick Links --}}
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-3">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-dark text-decoration-none">Home</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Shop</a></li>
          <li><a href="#" class="text-dark text-decoration-none">About</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Contact</a></li>
        </ul>
      </div>

      {{-- Social Media --}}
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-3">Follow Us</h5>
        <a href="#" class="me-3 text-dark"><i class="fab fa-facebook fa-lg"></i></a>
        <a href="#" class="me-3 text-dark"><i class="fab fa-twitter fa-lg"></i></a>
        <a href="#" class="me-3 text-dark"><i class="fab fa-instagram fa-lg"></i></a>
        <a href="#" class="me-3 text-dark"><i class="fab fa-linkedin fa-lg"></i></a>
        <a href="#" class="text-dark"><i class="fab fa-youtube fa-lg"></i></a>
      </div>
    </div>
  </div>
  <div class="text-center p-3 border-top" style="background-color: #f8f9fa;">
    © {{ date('Y') }} e_commerce. All rights reserved.
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('js/slide.js') }}"></script>
</body>
</html>
