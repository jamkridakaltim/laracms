@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-12">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Buat' }} Postingan
    </h1>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-lg-12">
    <form action="{{ $action }}" method="POST" class="bg-white shadow rounded p-4" enctype="multipart/form-data">
      @csrf
      @method($method)
      <div class="form-group">
        <label for="" class="form-label">Category</label>
        <select name="category_id" class="form-control">
          @foreach ($categories as $key => $item)
            <option value="{{ $item->id }}" {{ selected(old('category_id'), $item->id) }}>{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title')}}">
      </div>
      <div class="form-group">
        <label class="form-label">Content</label>
        <textarea id="content" name="content" class="description form-control">{{ old('content') }}</textarea>
      </div>
      <div class="mb-4">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="file" id="file">
          <label class="custom-file-label" for="customFile">Pilih Gambar</label>
          <small class="text-muted">Ukuran Gambar Max. 1.000 KB</small>
        </div>
        {{-- <div class="d-flex py-2"> --}}
        @if($image)
          <img src="{{ url(data_get($image,'path'))}}" class="rounded" height="200">
          <a href="{{ route('sitemanager.file.destroy', data_get($image,'id')) }}" data-method="delete" class="text-danger"><i class="bi-trash ml-2"></i>Hapus Gambar Ini</a>
          @else
          <img src="{{ asset('images/img-post.png') }}" height="200" class="mr-3" alt="..."> <br>
          <small class="text-muted">Upload Gambar Untuk mengganti foto ini</small>
        @endif
        {{-- </div> --}}
      </div>
      <div class="custom-control custom-switch">
        <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" {{ old('status') == 1 ? 'checked' : '' }}>
        <label class="custom-control-label" for="customSwitch1">Aktif</label>
      </div>
      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('id'))
            <a href="{{ route('sitemanager.post.destroy', old('id')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Hapus</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Simpan</button>
          <a href="{{ route('sitemanager.post.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Batal</a>
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
  <script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
  </script>
@endsection
