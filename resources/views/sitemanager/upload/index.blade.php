@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">File</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.file.create') }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-plus-circle"></i> Create</a>
    </div>
  </div>
  <div class="bg-white">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-purple">
        <th class="text-white text-center" width="50">#</th>
        <th class="text-white">Menu</th>
        <th class="text-white">Link</th>
        <th class="text-white text-center" width="120">Type</th>
        <th class="text-white text-center" width="80"><i class="bi-file-text"></i></th>
      </thead>
      <tbody>
        @forelse ($upload as $index => $item )
        <tr>
          <td class="text-center">{{ $index + 1 }}</td>
          <td>{{ $item->name }}</td>
          <td><a href="{{ url($item->path) }}">{{ $item->path }}</a></td>
          <td class="text-center">{{ ucfirst($item->type) }}</td>
          <td class="text-center">
            <a href="{{ route('sitemanager.file.edit', $item->id) }}" class="icon"><i class="bi-file-text"></i></a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center"><em>Data tidak ada</em></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  {{ $upload->links() }}
@endsection
