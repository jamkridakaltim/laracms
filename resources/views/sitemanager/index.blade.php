@extends('sitemanager._layouts.app')
@section('content')
<div class="bg-gray-200 rounded p-4">
  <h1>Selamat Datang</h1>
  <p class="lead">Halo, {{ Auth::user()->username }}.</p>
  {{-- <a class="btn btn-lg btn-primary" href="/docs/4.6/components/navbar/" role="button">View navbar docs »</a> --}}
</div>
<div class="row mt-4">
  @foreach ($contact as $index => $item)

  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $item->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $item->phone }}</h6>
        <p class="card-text">{{ $item->message }}</p>
        <div class="d-flex">
          <small>{{ date_indo($item->created_at) }}</small>
        </div>
        {{-- <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a> --}}
      </div>
    </div>
  </div>
  @endforeach

  {{ $contact->links() }}
</div>
@endsection
