@extends('web._layouts.app')
@section('top-content')
<div id="carouselExampleIndicators" class="carousel slide bg-light d-none d-sm-block" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">

    @foreach ($news as $index => $item)
    <div class="carousel-item {{ $index == 0 ? 'active' : ''}}">
      <div class="media p-3">
        <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="200" class="mr-3" alt="...">
        <div class="media-body">
          <a href="{{ url("/post/".$item->slug) }}" class="text-success"><h5 class="h3 mt-0">{{ $item->title }}</h5></a>
          <div>
            {!! tagline($item->content, 500) !!}
          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="p-1 bg-warning"></div>
@endsection

@section('content')
  <div class="card border-white">
    <div class="px-4 py-3 bg-success text-white">
      <span class="h5"><i class="bi-volume-up-fill"></i> BERITA TERKINI</span>
    </div>
    <div class="p-1 bg-warning"></div>

    <div class="p-2">
        @foreach ($news as $index => $item)
        <div class="media py-2">
          <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="64" class="mr-3" alt="...">
          <div class="media-body">
            <a href="{{ url("/post/".$item->slug) }}" class="text-success">{{ $item->title }}</a>
            {!! tagline($item->content, 500) !!}
          </div>
        </div>
        @endforeach
    </div>

  </div>

  <img src="https://indagkop.kaltimprov.go.id/asset/foto_iklantengah/STOP_GRATIFIKASI1.jpg" class="img-fluid">

  <div class="row py-4">
    <div class="col-lg-6 col-sm-12">
      <div class="card border-white">
        <div class="px-4 py-3 bg-success text-white">
          <span class="font-weight-bold"><i class="bi-newspaper mr-2"></i> SEPUTAR INDAGKOP</span>
        </div>
        <div class="p-1 bg-warning"></div>
        <div class="p-2">
          @foreach ($news as $index => $item)
          <div class="media py-2">
            <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="64" class="mr-3" alt="...">
            <div class="media-body">
              <a href="{{ url("/post/".$item->slug) }}" class="text-dark">{{ $item->title }}</a>
              <p class="small">{{ date_indo($item->published_at) }} / {{ $item->read }} view</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="card border-white">
        <div class="px-4 py-3 bg-success text-white">
          <span class="font-weight-bold"><i class="bi-journal-text mr-2"></i> ARTIKEL INDAGKOP</span>
        </div>
        <div class="p-1 bg-warning"></div>
        <div class="p-2">
          @foreach ($article as $index => $item)
          <div class="media py-2">
            <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="64" class="mr-3" alt="...">
            <div class="media-body">
              <a href="{{ url("/post/".$item->slug) }}" class="text-dark">{{ $item->title }}</a>
              <p class="small">{{ date_indo($item->published_at) }} / {{ $item->read }} view</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <img src="https://indagkop.kaltimprov.go.id/asset/foto_iklantengah/PUBLIKASI.jpg" class="img-fluid">

  <div class="row py-4">
    <div class="col-lg-6 col-sm-12">
      <div class="card border-white">
        <div class="px-4 py-3 bg-success text-white">
          <span class="font-weight-bold"><i class="bi-newspaper mr-2"></i> PENGUMUMAN</span>
        </div>
        <div class="p-1 bg-warning"></div>
        <div class="p-2">
          @foreach ($announcement as $index => $item)
          <div class="media py-2">
            <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="64" class="mr-3" alt="...">
            <div class="media-body">
              <a href="{{ url("/post/".$item->slug) }}" class="text-dark">{{ $item->title }}</a>
              <p class="small">{{ date_indo($item->published_at) }} / {{ $item->read }} view</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="card border-white">
        <div class="px-4 py-3 bg-success text-white">
          <span class="font-weight-bold"><i class="bi-journal-text mr-2"></i> NASIONAL</span>
        </div>
        <div class="p-1 bg-warning"></div>
        <div class="p-2">
          @foreach ($national as $index => $item)
          <div class="media py-2">
            <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="64" class="mr-3" alt="...">
            <div class="media-body">
              <a href="{{ url("/post/".$item->slug) }}" class="text-dark">{{ $item->title }}</a>
              <p class="small">{{ date_indo($item->published_at) }} / {{ $item->read }} view</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

@endsection
