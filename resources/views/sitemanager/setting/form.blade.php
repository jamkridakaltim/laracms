@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-12">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Buat' }} Pengaturan
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-12">
    <form action="{{ $action }}" method="POST" class="bg-white p-4" enctype="multipart/form-data">
      @csrf
      @method($method)
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="">Key</label>
            <input type="text" class="form-control" name="key" value="{{ old('key')}}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="">Value</label>
            <input type="text" class="form-control" name="value" value="{{ old('value')}}">
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('key'))
            <a href="{{ route('sitemanager.setting.destroy', old('key')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Hapus</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Simpan</button>
          <a href="{{ route('sitemanager.setting.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Batal</a>
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
