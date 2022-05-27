@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-primary text-white">
      <span class="h6">Agenda</span>
    </div>
    <div class="pl-4 py-2 bg-info font-weight-bold">
      {{-- <i class="bi bi-clock"></i> {{ date_indo($page->published_at) }} / <i class="bi bi-person ml-1"></i>  {{ ucfirst($user->username) }} --}}
    </div>
    <div class="py-1">
    </div>
    <div class="py-2">
      {{-- <a class="mr-2" href="#">
        <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" class="img-fluid" alt="...">
      </a> --}}
      <div class="py-2">
        {{-- <h5 class="mt-0">{{ $page->title }}</h5> --}}
        {{-- {!! $page->content !!} --}}
        <div class="bg-white">
          <table class="table table-sm table-bordered table-hover">
            <thead class="bg-green">
              {{-- <th class="text-white text-center" width="50">#</th> --}}
              <th class="text-white">Tanggal/Pukul</th>
              <th class="text-white">Agenda</th>
              <th class="text-white text-center">Lokasi</th>
            </thead>
            <tbody>
              @forelse ($agenda as $index => $item )
              <tr>
                {{-- <td class="text-center">{{ $index + 1 }}</td> --}}
                <td>
                  {{ date_indo($item->date) }}
                  <br>{{ $item->time }} WITA
                </td>
                <td>{{ $item->caption }}</td>
                <td>{{ $item->location }}</td>
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
      </div>
    </div>

  </div>
@endsection
