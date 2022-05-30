@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-primary text-white">
      <span class="h6">{{ $post->title }}</span>
    </div>
    <div class="pl-4 py-2 bg-purple font-weight-bold">
      <i class="bi bi-clock"></i> {{ date_indo($post->published_at) }} / <i class="bi bi-person ml-1"></i> {{ $user->username }} / <i class="bi bi-eye ml-1"></i> {{ $post->read }} views
    </div>
    <div class="py-1">
    </div>
    <div class="py-2">
      <a class="mr-2" href="#">
        <img src="{{ $image::postImage($post->id)->value('path') ? url($image::postImage($post->id)->value('path')) : asset('images/img-post.png') }}" class="img-fluid" alt="...">
      </a>
      <div class="py-2 px-4">
        {!! $post->content !!}
      </div>
    </div>
    <div id="disqus_thread"></div>

  </div>
@endsection

