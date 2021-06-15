@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Galeri / Video</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.menu.create') }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-plus-circle"></i> Buat</a>
    </div>
  </div>
@endsection
