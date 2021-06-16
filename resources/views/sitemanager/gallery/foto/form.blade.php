@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-12">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Tambah' }} Foto
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-12">
    <form action="{{ $action }}" method="POST" class="bg-white p-4" enctype="multipart/form-data">
      @csrf
      @method($method)
      <div class="form-group">
        <label for="" class="form-label">Caption</label>
        <input type="text" name="caption" class="form-control" value="{{ data_get($foto, 'caption') }}" {{ data_get($foto, 'featured') != 0 ? 'readonly' : '' }}>
      </div>
      <div class="form-group">
        <label for="" class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" {{ data_get($foto, 'featured') != 0 ? 'readonly' : '' }}>{{ data_get($foto, 'description') }}</textarea>
      </div>
      <div class="mb-4">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="file" id="file">
          <label class="custom-file-label" for="customFile">Pilih Gambar</label>
          <small class="text-muted">Ukuran Gambar Max. 1.000 KB</small>
        </div>
        @if(old('link'))
        <div class="d-flex py-2">
          <img src="{{ url(old('link'))}}" class="rounded img-thumbnail w-25">
        </div>
        @endif
      </div>
      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('id'))
            <a href="{{ route('sitemanager.foto.destroy', old('id')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Hapus</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Simpan</button>
          <a href="{{ route('sitemanager.foto.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
