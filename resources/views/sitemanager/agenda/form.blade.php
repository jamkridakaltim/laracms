@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-8">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Buat' }} Agenda
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-8">
    <form action="{{ $action }}" method="POST" class="bg-white shadow rounded p-4" enctype="multipart/form-data">
      @csrf
      @method($method)
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="" class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" value="{{ old('date')}}" required>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="" class="form-label">Pukul</label>
            <input type="time" name="time" class="form-control" value="{{ old('time')}}" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="form-label">Agenda</label>
        <input type="text" name="caption" class="form-control" value="{{ old('caption')}}" required>
      </div>
      <div class="form-group">
        <label for="" class="form-label">Lokasi</label>
        <input type="text" name="location" class="form-control" value="{{ old('location')}}" required>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi</label>
        <textarea id="content" name="description" class="form-control" required rows="5">{{ old('description') }}</textarea>
      </div>
      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('id'))
            <a href="{{ route('sitemanager.agenda.destroy', old('id')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Hapus</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Simpan</button>
          <a href="{{ route('sitemanager.agenda.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
