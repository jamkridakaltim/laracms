@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Postingan</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.post.create') }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-plus-circle"></i> Buat</a>
    </div>
  </div>
  <div class="bg-white">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-purple">
        <th class="text-white text-center" width="50">#</th>
        <th class="text-white">Title</th>
        <th class="text-white">Category</th>
        <th class="text-white text-center" width="80">Status</th>
        <th class="text-white text-center" width="80"><i class="bi-file-text"></i></th>
      </thead>
      <tbody>
        @forelse ($post as $index => $item )
        <tr>
          <td class="text-center">{{ $index + 1 }}</td>
          <td>{{ $item->title }}</td>
          <td>{{ $item->category->name }}</td>
          <td class="text-center text-{{ $item->status == 1 ? 'success' : 'danger' }}">{{ $item->status == 1 ? 'On' : 'Off' }}</td>
          <td class="text-center">
            <a href="{{ route('sitemanager.post.edit', $item->id) }}" class="icon"><i class="bi-file-text"></i></a>
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
  {{ $post->links() }}
@endsection
