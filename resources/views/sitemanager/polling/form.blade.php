@extends('sitemanager._layouts.app')
@section('content')
<div class="row justify-content-center pb-2">
  <div class="col-lg-8">
    <h1 class="h4">
      {{ old('id') ? 'Edit' : 'Buat' }} Polling
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
        <label for="" class="form-label">Polling</label>
        <input type="hidden" name="parent_id" value="{{ $parent->id }}">
        <input type="text" name="parent" class="form-control" value="{{ $parent->content }}" readonly>
      </div>
      @endif

      <div class="form-group">
        <label for="" class="form-label">Pertanyaan {{ $parent == null ? '' : 'Jawaban'}}</label>
        <input type="text" name="content" class="form-control" value="{{ old('content')}}">
      </div>
      <div class="d-flex justify-content-between pt-2">
        <div>
          @if(old('id'))
            <a href="{{ route('sitemanager.polling.destroy', old('id')) }}" data-method="delete" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i> Delete</a>
          @endif
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi-save"></i> Save</button>
          <a href="{{ route('sitemanager.polling.index') }}" class="btn btn-sm btn-outline-secondary"><i class="bi-x-circle"></i> Cancel</a>
        </div>

      </div>
    </form>
  </div>
</div>

@endsection
