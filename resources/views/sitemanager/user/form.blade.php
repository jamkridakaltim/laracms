@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-8">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Buat' }} User
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-8">
    <form action="{{ $action }}" method="POST" class="bg-white p-4" enctype="multipart/form-data">
      @csrf
      @method($method)
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" value="{{ old('username')}}">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email')}}">
        <small class="text-muted">*) opsional</small>
      </div>
      <div class="form-group">
        <label for="">Level</label>
        <select name="level" id="" class="form-control">
          @foreach ($level as $item)
            <option value="{{$item}}" {{ selected(old('level'), $item) }}>{{ ucfirst($item) }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password">
        @if (old('id'))
          <small class="text-danger">*) wajib di isi jika ingin mengganti password</small>
        @else
          <small class="text-muted">*) wajib di isi</small>
        @endif
      </div>
      <div class="form-group">
        <label for="">Password Confirmation</label>
        <input type="password" class="form-control" name="password_confirmation">
        @if (old('id'))
          <small class="text-danger">*) wajib melakukan konfirmasi password</small>
        @else
          <small class="text-muted">*) wajib di isi</small>
        @endif
      </div>

      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('id'))
            <a href="{{ route('sitemanager.user.destroy', old('id')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Hapus</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Simpan</button>
          <a href="{{ route('sitemanager.user.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
