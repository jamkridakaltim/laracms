@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Menu</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.menu.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Tambah</a>
    </div>
  </div>
  <div class="bg-white">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-primary">
        <th class="text-white text-center" width="50">#</th>
        <th class="text-white">Nama</th>
        <th class="text-white text-center" width="80"><i class="bi-file-text"></i></th>
      </thead>
      <tbody>
        @forelse ($menu as $index => $item )
        <tr>
          <td class="text-center">{{ $index + 1 }}</td>
          <td>{{ $item->name }}</td>
          <td class="text-center">
            <a href="{{ route('sitemanager.menu.edit', $item->id) }}" class="icon"><i class="bi-file-text"></i></a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center"><em>Data tidak ada</em></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
