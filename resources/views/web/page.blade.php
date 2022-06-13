@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-primary text-white">
      <h3 class="h-2">{{ $page->title }}</h3>
    </div>
    <div class="px-4 py-2 bg-info text-white text-right font-weight-bold">
      <i class="bi bi-clock"></i> {{ date_indo($page->published_at) }} / <i class="bi bi-person ml-1"></i>  {{ ucfirst($user->username) }}
    </div>
    <div class="py-1">
    </div>
    <div class="py-2">
      {{-- <a class="mr-2" href="#">
        <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" class="img-fluid" alt="...">
      </a> --}}
      <div class="py-2 px-4">
        {{-- <h5 class="mt-0">{{ $page->title }}</h5> --}}
        {!! $page->content !!}
      </div>
    </div>

  </div>
@endsection
