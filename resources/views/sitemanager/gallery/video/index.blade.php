@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Galeri / Video</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.video.create', ['featured' => 1]) }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-plus-circle"></i> Tambah</a>
    </div>
  </div>
  <div class="row">

      @foreach ($gallery as $index => $item)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <div class="embed-responsive embed-responsive-16by9 mb-2">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $item->link }}?rel=0" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">{{ $item->caption }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('sitemanager.video.destroy', $item->id) }}" data-method="delete" class=" text-danger"><i class="bi-trash"></i> Hapus</a>
                <a href="{{ route('sitemanager.video.edit', $item->id) }}" class=" text-purple"><i class="bi-pencil"></i> Edit</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      <div class="col-md-12">
        {{ $gallery->links() }}
      </div>
  </div>
@endsection
