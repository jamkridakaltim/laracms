@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Manajemen Pengguna</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.user.create') }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-plus-circle"></i> Create</a>
    </div>
  </div>
  <div class="bg-white">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-purple">
        <th class="text-white">Username</th>
        <th class="text-white">Level</th>
        <th class="text-white text-center" width="80"><i class="bi-file-text"></i></th>
      </thead>
      <tbody>
        @forelse ($users as $user => $item )
        <tr>
          <td>{{ ucfirst($item->username) }}</td>
          <td>{{ ucfirst($item->level) }}</td>
          <td class="text-center">
            <a href="{{ route('sitemanager.user.edit', $item->id) }}" class="icon"><i class="bi-file-text"></i></a>
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
@endsection
