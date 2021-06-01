<nav class="navbar navbar-expand-md navbar-light bg-purple">
  <div class="container">
    <a class="navbar-brand text-white" href="#">CMS</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link text-white" href="{{ url('sitemanager') }}"><i class="bi-house"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('sitemanager/menu') }}"><i class="bi-menu-button"></i> Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('sitemanager/page') }}"><i class="bi-file-text"></i> Pages</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi-file-richtext"></i> Post</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="{{ url('sitemanager/post')}}">Posts</a>
            <a class="dropdown-item" href="{{ url('sitemanager/post-category')}}">Categories</a>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('sitemanager/polling') }}"><i class="bi-list-stars"></i> Polling</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('sitemanager/agenda') }}"><i class="bi-calendar3"></i> Agenda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('sitemanager/file') }}"><i class="bi-archive"></i> File</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi-sliders"></i> Setting</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">User</a>
            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ url('/') }}" target="_blank" class="nav-link text-white"><i class="bi-arrow-up-right-circle-fill"></i> Preview</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('sitemanager.logout') }}" class="nav-link text-white"><i class="bi-power"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>

</nav>
