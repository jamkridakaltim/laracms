<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
  <div class="container">
    <a class="navbar-brand" href="#">Site Manager</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#"><i class="bi bi-house"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-menu-button"></i> Menu</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-richtext"></i> Halaman</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Posting</a>
            <a class="dropdown-item" href="#">Static</a>
            <a class="dropdown-item" href="#">Kategori</a>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-list-stars"></i> Polling</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-calendar3"></i> Agenda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-archive"></i> File</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-sliders"></i> Pengaturan</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Pengguna</a>
            {{-- <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a> --}}
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ url('/') }}" target="_blank" class="nav-link"><i class="bi bi-arrow-up-right-circle-fill"></i> Preview</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link"><i class="bi bi-power"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>

</nav>
