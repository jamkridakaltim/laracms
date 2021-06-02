@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-success text-white">
      <span class="h6">{{ $post->title }}</span>
    </div>
    <div class="pl-4 py-2 bg-warning font-weight-bold">
      <i class="bi bi-clock"></i> {{ date_indo($post->published_at) }} / <i class="bi bi-person ml-1"></i> {{ $user->username }} / <i class="bi bi-eye ml-1"></i> {{ $post->read }} views
    </div>
    <div class="py-1">
    </div>
    <div class="py-2">
      <a class="mr-2" href="#">
        <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" class="img-fluid" alt="...">
      </a>
      <div class="py-2">
        {!! $post->content !!}
      </div>
    </div>

  </div>
@endsection
