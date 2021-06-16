@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-8">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Tambah' }} Video
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-8">
    <form action="{{ $action }}" method="POST" class="bg-white p-4" enctype="multipart/form-data">
      @csrf
      @method($method)
      <div class="form-group">
        <label for="" class="form-label">Caption</label>
        <input type="text" name="caption" class="form-control" value="{{ old('caption') }}">
      </div>
      <div class="form-group">
        <label for="" class="form-label">Link</label>
        <input type="text" name="link" class="form-control" value="{{ old('link') }}">
        <span class="text-muted">
          Masukkan Link Video Youtube, Contoh: "https://www.youtube.com/watch?v=wiqSUtzgfKs
        </span>
      </div>
      <div class="form-group">
        <label for="" class="form-label">Deskripsi</label>
        <textarea name="description" rows="5" class="form-control" {{ data_get($foto, 'featured') != 0 ? 'readonly' : '' }}>{{ data_get($foto, 'description') }}</textarea>
      </div>
      {{-- <div class="mb-4">
        @if(old('link'))
        <div class="d-flex py-2">
          <img src="{{ url(old('link'))}}" class="rounded img-thumbnail w-25">
        </div>
        @endif
      </div> --}}
      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('id'))
            <a href="{{ route('sitemanager.video.destroy', old('id')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Hapus</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Simpan</button>
          <a href="{{ route('sitemanager.video.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
