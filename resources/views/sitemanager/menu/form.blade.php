@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-8">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Tambah' }} Menu
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-8">
    <form action="{{ $action }}" method="POST" class="bg-white p-4">
      @csrf
      @method($method)
      <div class="form-group">
        <label for="" class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name')}}">
      </div>
      <div class="form-group">
        <label for="" class="form-label">Url</label>
        <input type="text" name="url" class="form-control" value="{{ old('url')}}">
      </div>
      <div class="form-group">
        <label class="form-label">Konten</label>
        <textarea id="content" name="content" class="description form-control">{{ old('content') }}</textarea>
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
@section('bottom-script')
  @parent
  <script>
      tinymce.init({
        selector: '#content',
        height: 350,
        plugins: 'print code preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect fontsizeselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
      });
  </script>
@endsection
