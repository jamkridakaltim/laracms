@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-primary text-white">
      <span class="h6">GALERI / FOTO</span>
    </div>
    <div class="py-1 bg-info">
    </div>
    <div class="row mt-4">
      @foreach ($gallery as $index => $item)
        <div class="col-md-4">
          <a href="{{ url('/galeri/foto/'.$item->slug) }}">
            <div class="card mb-4 shadow-sm">
              <img src="{{ url($item->link)}}" class="card-img-top p-2" width="100%" height="225">
              <div class="card-body">
                <p class="card-text">{{ $item->caption }}</p>
                <div class="d-flex justify-content-between align-items-center">
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
      <div class="col-md-12">
        {{ $gallery->links() }}
      </div>
  </div>
  </div>
@endsection
