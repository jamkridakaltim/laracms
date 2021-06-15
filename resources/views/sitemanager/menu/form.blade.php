@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-8">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Buat' }} Menu
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-8">
    <form action="{{ $action }}" method="POST" class="bg-white p-4">
      @csrf
      @method($method)

      @if($parent != null)
      <div class="form-group">
        <label for="" class="form-label">Menu</label>
        <input type="hidden" name="parent_id" value="{{ $parent->id }}">
        <input type="text" name="parent" class="form-control" value="{{ $parent->name }}" readonly>
      </div>
      @endif

      <div class="form-group">
        <label for="" class="form-label">Name {{ $parent == null ? '' : 'Submenu'}}</label>
        <input type="text" name="name" class="form-control" value="{{ old('name')}}">
      </div>
      <div class="form-group">
        <label for="" class="form-label">Link</label>
        <input type="text" name="link" class="form-control" value="{{ old('link')}}">
        <small class="text-muted">** Opsional</small>
      </div>
      <div class="custom-control custom-switch">
        <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" {{ old('status') == 1 ? 'checked' : '' }}>
        <label class="custom-control-label" for="customSwitch1">Aktif</label>
      </div>
      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('id'))
            <a href="{{ route('sitemanager.menu.destroy', old('id')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Hapus</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Simpan</button>
          <a href="{{ route('sitemanager.menu.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Batal</a>
        </div>

      </div>
    </form>
  </div>
</div>

@endsection
