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
    <form action="{{ $action }}" method="POST" class="bg-white p-4">
      @csrf
      @method($method)
      {{-- <div class="form-group">
        <label for="" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title')}}">
      </div> --}}
      <div class="form-group">
        <label class="form-label">Content</label>
        <textarea id="content" name="content" class="description form-control">{{ old('content') }}</textarea>
      </div>
      <div class="custom-control custom-switch">
        <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" {{ old('status') == 1 ? 'checked' : '' }}>
        <label class="custom-control-label" for="customSwitch1">Aktif</label>
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
        height: 350,
        plugins: 'print code preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect fontsizeselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
      });
  </script>
@endsection
