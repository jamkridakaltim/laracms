@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-2 py-2 bg-success text-white">
      <span class="h6">{{ $result->content }}</span>
    </div>
    <div class="p-2 bg-warning font-weight-bold text-white">
      Total Vote : {{ $result['total'] }}
    </div>
    <div class="py-2 mb-4">

      {{-- <ul> --}}
        @foreach ($result['answer'] as $index => $item)
        <label class="text-success font-weight-bold">{{ $item->content }}</label>
        <div class="progress mb-2" style="height: 32px;">
          <div class="progress-bar progress-bar-striped bg-warning font-weight-bold" role="progressbar" style="width: {{ $item['total'] == 0 ? 0 : ($item->score/$result['total'])*100 }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{ round(($item->score/$result['total'])*100) }}%</div>
        </div>
        @endforeach


      {{-- </ul> --}}
    </div>

  </div>
@endsection
