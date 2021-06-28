@php
$items = \App\Models\Company::select('image','title')->first();
@endphp
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="{{ route('/') }}" class="logo d-flex align-items-center">
      @if ($items->image ?? 0)
      <img src="{{ Storage::url($items->image) }}" alt="">
      @else
      <img src="{{ asset('assets/img/logo.png') }}" alt="">
      @endif
      <span>{{ $items->title ?? ''}}</span>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">About</a></li>
        <li><a class="nav-link scrollto" href="#services">Services</a></li>
        <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="#team">Team</a></li>
        <li><a href="{{ route('blog.index') }}">Blog</a></li>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        @auth
        <li><a class="getstarted scrollto" 
                href="#" 
                class="dropdown-item has-icon text-danger" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a></li>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
        @endauth
        @guest
        <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
        @endguest
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

