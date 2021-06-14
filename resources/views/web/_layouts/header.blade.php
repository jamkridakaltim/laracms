@inject('web', 'App\Services\WebService')
<div class="p-1 bg-warning"></div>
<div class="container">
  <div class="d-flex row bg-dark">
    <div class="p-2 bg-success text-white rounded-right">Breaking News !</div>
    <div class="col-8 p-2 bg-dark">
      <marquee class="text-white">
        @foreach ($news as $index => $item)
          <a href="{{ url("/post/".$item->slug) }}" class="text-warning"><i class="bi bi-file-richtext mr-2"></i>{{ $item->title }}</a> &nbsp; - &nbsp;
        @endforeach
      </marquee>
    </div>
    <div class="col p-2 bg-success text-white rounded-left">
      <div class="digital_clock_wrapper">
        {{ date_indo(today()) }},
        <span id="digit_clock_time"></span> WITA
        {{-- <div id="digit_clock_date"></div> --}}
      </div>
    </div>
  </div>
</div>

<div class="p-1 bg-warning"></div>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach ($web->banners() as $key => $item)
    <div class="carousel-item {{ $key == 0 ? 'active' : ''}}">
      <img src="{{ url($item->path) }}" class="d-block w-100">
    </div>
    @endforeach
  </div>
</div>

<nav class="px-2 py-2 navbar-expand-lg navbar-dark bg-success">
  {{-- <a class="navbar-brand" href="#"></a> --}}

  <div class="text-right">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon small"></span>
    </button>
  </div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @foreach ($web->menus() as $index => $item)
      <li class="nav-item {{ active_link([$item->link]) }}">
        <a href="{{ check_url($item->link) ? $item->link : url("/".$item->link) }}" target="{{ check_url($item->link) ? "_blank" : "" }}" class="nav-link text-white {{$item->submenu->count() > 0 ? 'dropdown-toggle': ''}}" {{$item->submenu->count() > 0 ? 'data-toggle=dropdown': ''}}>{{ strtoupper($item->name) }}</a>
        @if($item->submenu->count() > 0)
        <div class="dropdown-menu">
        @foreach ($item->submenu as $subindex => $subitem)
            <a href="{{ check_url($subitem->link) ? $subitem->link : url("/".$subitem->link) }}" target="{{ check_url($subitem->link) ? "_blank" : "" }}" class="dropdown-item small">{{ $subitem->name }}</a>
        @endforeach
        </div>
        @endif
      </li>
      @endforeach
    </ul>
    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}
  </div>
</nav>

<div class="p-1 bg-warning"></div>
