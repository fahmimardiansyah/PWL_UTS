<header class="header">
  <div class="logo">
      <a href="{{ url('/') }}">
          <img src="{{ asset('img/logo.png') }}" alt="Logo">
      </a>
  </div>
  <nav class="navbar">
      <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="#category">Category</a></li>
          <li><a href="#catalog">Catalog</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="{{ url ('login') }}" class="btn">Login</a></li>
      </ul>
        {{-- <div class="menu-toggle">
      <i class="fas fa-bars"></i> --}}
  </div>
  </nav>
</header>