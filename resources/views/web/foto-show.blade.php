@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-success text-white">
      <span class="h6">GALERI / FOTO</span>
    </div>
    <div class="py-1 bg-warning">
    </div>
    <div class="row mt-4">
      @foreach ($gallery as $index => $item)
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <img src="{{ url($item->link)}}" class="card-img-top p-2" width="100%" height="225">
      </div>
    </div>
    @endforeach
  </div>
  </div>
@endsection
