@extends('sitemanager._layouts.app')
@section('content')
<div class="jumbotron">
  <h1>Selamat Datang</h1>
  <p class="lead">Halo, {{ Auth::user()->username }}.</p>
  {{-- <a class="btn btn-lg btn-primary" href="/docs/4.6/components/navbar/" role="button">View navbar docs »</a> --}}
</div>
@endsection
