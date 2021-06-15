@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Galeri / Foto</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.foto.create', ['featured' => 0, 'slug' => $sub ]) }}" class="btn btn-sm bg-purple text-white mr-2"><i class="bi bi-plus-circle"></i> Tambah</a>
      <a href="{{ route('sitemanager.foto.index') }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
  </div>
  <div class="d-flex">
    @foreach ($gallery as $index => $item)
    <div class="col">
      <img src="{{ url($item->link)}}" class="img-thumbnail">
      @if($item->featured == 0)
        <a href="{{ route('sitemanager.foto.destroy', $item->id) }}" data-method="delete" class=" text-danger"><i class="bi-trash"></i> Hapus</a>
      @endif
    </div>
    @endforeach
  </div>
@endsection
