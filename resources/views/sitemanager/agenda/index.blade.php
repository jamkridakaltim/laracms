@extends('sitemanager._layouts.app')
@section('content')
  <div class="d-flex justify-content-between pb-2">
    <h5 class="h4">Agenda</h5>
    <div class="text-right">
      <a href="{{ route('sitemanager.agenda.create') }}" class="btn btn-sm bg-purple text-white"><i class="bi bi-plus-circle"></i> Buat</a>
    </div>
  </div>
  <div class="bg-white">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-purple">
        <th class="text-white text-center" width="50">#</th>
        <th class="text-white">Tanggal</th>
        <th class="text-white">Pukul</th>
        <th class="text-white">Agenda</th>
        <th class="text-white text-center">Lokasi</th>
        <th class="text-white text-center" width="80"><i class="bi-file-text"></i></th>
      </thead>
      <tbody>
        @forelse ($agenda as $index => $item )
        <tr>
          <td class="text-center">{{ $index + 1 }}</td>
          <td>{{ date_indo($item->date) }}</td>
          <td>{{ $item->time }} WITA</td>
          <td>{{ $item->caption }}</td>
          <td>{{ $item->location }}</td>
          <td class="text-center">
            <a href="{{ route('sitemanager.agenda.edit', $item->id) }}" class="icon"><i class="bi-file-text"></i></a>
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
  {{ $agenda->links() }}
@endsection
