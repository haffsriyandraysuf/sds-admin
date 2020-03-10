<!-- NAVBAR -->
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a href="#" class="navbar-brand">
      <img src="{{ url('frontend/images/logo.png') }}" alt="logo-startek">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav ml-auto mr-3">
        <!-- <li class="nav-item mx-md-2"><a href="#" class="active nav-link">Home</a></li> -->
        
        <!-- Dropdown -->
        <!-- <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Service</a>
          <div class="dropdown-menu">
            <a href="" class="dropdown-item">Link</a>
            <a href="" class="dropdown-item">Link</a>
            <a href="" class="dropdown-item">Link</a>
          </div>
        </li> -->
      </ul>
    
    @guest
      <!-- Mobile Button -->
        <form action="" class="form-inline d-sm-block d-md-none">
          <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
            Masuk
          </button>
        </form>
        <form action="" class="form-inline d-sm-block d-md-none">
          <button class="btn btn-daftar my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url
        ('register') }}';">
            Daftar
          </button>
        </form>
        <!-- Desktop Button -->
        <form action="" class="form-inline my-2 my-lg-0 d-none d-sm-block">
          <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
            Masuk
          </button>
          <button class="btn btn-daftar btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url
        ('register') }}';">
            Daftar
          </button>
        </form>
    @endguest
    @auth
      <!-- Mobile Button -->
        <form action="{{ url('logout') }}" method="POST" class="form-inline d-sm-block d-md-none">
          @csrf
          <button class="btn btn-login my-2 my-sm-0" type="submit">
            Keluar
          </button>
        </form>
        <!-- Desktop Button -->
        <form action="{{ url('logout') }}" method="POST" class="form-inline my-2 my-lg-0 d-none d-sm-block">
          @csrf
          <button class="btn btn-login my-2 my-sm-0" type="submit">
            Keluar
          </button>
        </form>
      @endauth
    </div>
  </nav>
</div>
<!-- END NAVBAR -->