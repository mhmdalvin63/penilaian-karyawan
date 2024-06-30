<link rel="stylesheet" href="{{asset('../frontEnd/css/global.css')}}"> 

<nav class="navbar navbar-expand-lg" id="nav-utama">
  <div class="container">
    <a class="navbar-brand" href="#">
        <img src="{{asset('../frontEnd/images/logo-nav.png')}}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('beranda') ? 'nav-active' : '' }}" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('departement') ? 'nav-active' : '' }}" href="{{ route('departement') }}">Departement</a>
        </li>
        
      </ul>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Hi, Wisnu Aryo!
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>