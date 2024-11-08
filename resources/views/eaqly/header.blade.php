<header class="header">
  <div class="logo">
      <a href="{{ url('/') }}">
          <img src="{{ asset('img/logo.png') }}" alt="Logo">
      </a>
  </div>
  <nav class="navbar">
      <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('catalog') }}">Clothes</a></li>
          <li><a href="{{ url('assets') }}">Assets</a></li>
          <li><a href="{{ url('client') }}">Client</a></li>

          <!-- Periksa apakah pengguna sudah login -->
          @if (Auth::check())
              <li>
                  <a href="{{ url('account') }}">
                    <img src="{{ asset('img/ian.jpg') }}" alt="Profile" class="profile-picture">
                  </a>
              </li>
          @else
              <!-- Tampilkan tombol login jika belum login -->
              <li><a href="{{ url('login') }}" class="btn">Login</a></li>
          @endif
      </ul>
  </nav>
</header>
 