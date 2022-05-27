@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-12">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Add' }} File
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-12">
    <form action="{{ $action }}" method="POST" class="bg-white p-4" enctype="multipart/form-data">
      @csrf
      @method($method)
      <div class="form-group">
        <label for="" class="form-label">Type</label>
        <select name="type" class="form-control">
          @foreach ($type as $key)
            <option value="{{ $key }}" {{ selected(old('type'),$key) }}>{{ ucfirst($key) }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-4">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="file" id="file">
          <label class="custom-file-label" for="customFile">Pilih Gambar</label>
          <small class="text-muted">Ukuran Gambar Max. 1.024 KB</small>
        </div>
        @if(old('path'))
        <div class="d-flex py-2">
          <img src="{{ url(old('path'))}}" class="rounded img-thumbnail w-25">
        </div>
        @endif
      </div>
      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('id'))
            <a href="{{ route('sitemanager.file.destroy', old('id')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Hapus</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Simpan</button>
          <a href="{{ route('sitemanager.file.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Batal</a>
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
        height: 800,
        plugins: 'print code preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect fontsizeselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
      });
  </script>
@endsection
