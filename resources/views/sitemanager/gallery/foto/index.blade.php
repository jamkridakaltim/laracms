@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Galeri / Foto</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.foto.create', ['featured' => 1]) }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-plus-circle"></i> Buat</a>
    </div>
  </div>
  <div class="card-deck">
    @foreach ($gallery as $index => $item)
      <div class="card">
        <img src="{{ url($item->link)}}" class="card-img-top p-2" height="200">
        <div class="card-body">
          <h5 class="card-title">{{ $item->caption }}</h5>
          <p class="card-text">{{ $item->description }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
          <a href="{{ route('sitemanager.foto.destroy', $item->id) }}" data-method="delete" class=" text-danger"><i class="bi-trash"></i> Hapus</a>
          <a href="{{ route('sitemanager.foto.show', $item->slug) }}"><i class="bi-files"></i> Buka</a>
        </div>
      </div>
      @endforeach
  </div>
@endsection
