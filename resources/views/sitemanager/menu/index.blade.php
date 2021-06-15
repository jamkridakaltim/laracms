@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Menu</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.menu.create') }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-plus-circle"></i> Buat</a>
    </div>
  </div>
  <div class="bg-white">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-purple">
        <th class="text-white text-center" width="50">#</th>
        <th class="text-white">Nama</th>
        <th class="text-white" width="80">Status</th>
        <th class="text-white text-center" width="60"><i class="bi-file-text"></i></th>
      </thead>
      <tbody>
        @forelse ($menu as $index => $item )
        <tr class="bg-gray-200">
          <td class="">{{ $index + 1 }}</td>
          <td>{{ $item->name }}</td>
          <td class="text-center text-{{ $item->status == 1 ? 'success' : 'danger' }}">{{ $item->status == 1 ? 'On' : 'Off' }}</td>
          <td class="text-right">
            @if($item->lock != 1)
            <a href="{{ route('sitemanager.menu.create', ['id' => $item->id]) }}" class="icon mr-2"><i class="bi-plus"></i></a>
            <a href="{{ route('sitemanager.menu.edit', $item->id) }}" class="icon"><i class="bi-file-text"></i></a>
            @endif
          </td>
        </tr>
          @if($item->subitem->count() > 0)
            @foreach ($item->subitem as $subIndex => $subItem)
            <tr>
              <td class="">{{ ($index + 1 ) .".". ($subIndex + 1) }}</td>
              <td>{{ $subItem->name }}</td>
              <td class="text-center text-{{ $subItem->status == 1 ? 'success' : 'danger' }}">{{ $subItem->status == 1 ? 'On' : 'Off' }}</td>
              <td class="text-right">
                <a href="{{ route('sitemanager.menu.edit', [$subItem->id, 'id' => $item->id]) }}" class="icon"><i class="bi-file-text"></i></a>
              </td>
            </tr>
            @endforeach
          @endif
        @empty
        <tr>
          <td colspan="3" class="text-center"><em>Data tidak ada</em></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
