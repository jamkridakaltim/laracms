@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-success text-white">
      <span class="h6">{{ $result->content }}</span>
    </div>
    <div class="py-1">
    </div>
    <div class="py-2">
      <ul>
        @foreach ($result['answer'] as $index => $item)
        <li>{{ $item->content }} - {{ $item->score }}</li>
        @endforeach
      </ul>
    </div>

  </div>
@endsection
