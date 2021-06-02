@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Polling</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.polling.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Create</a>
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
        @forelse ($polling as $index => $item )
        <tr class="bg-gray-200">
          <td class="text-center">{{ $index + 1 }}</td>
          <td>{{ $item->content }}</td>
          <td class="text-center">
            <a href="{{ route('sitemanager.polling.create', ['id' => $item->id]) }}" class="icon"><i class="bi-plus"></i></a>
            <a href="{{ route('sitemanager.polling.edit', $item->id) }}" class="icon"><i class="bi-file-text"></i></a>
          </td>
        </tr>
          @if($item->subitem->count() > 0)
            @foreach ($item->subitem as $subIndex => $subItem)
            <tr>
              <td class="text-center">{{ ($index + 1 ) .".". ($subIndex + 1) }}</td>
              <td>{{ $subItem->content }}</td>
              <td class="text-center">
                <a href="{{ route('sitemanager.polling.edit', [$subItem->id, 'id' => $item->id]) }}" class="icon"><i class="bi-file-text"></i></a>
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