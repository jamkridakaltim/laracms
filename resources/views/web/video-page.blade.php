@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-success text-white">
      <span class="h6">GALERI / VIDEO </span>
    </div>
    <div class="py-1 bg-warning">
    </div>
    <div class="py-1">
    </div>
    <div class="row">
      @foreach ($listVideo as $index => $item)
      <div class="col-md-6">
          <div class="embed-responsive embed-responsive-16by9 mb-2">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $item->link }}?rel=0" allowfullscreen></iframe>
          </div>
        </div>
      @endforeach
      <div class="col-md-12">
        {{ $listVideo->links() }}
      </div>
    </div>
  </div>
@endsection
