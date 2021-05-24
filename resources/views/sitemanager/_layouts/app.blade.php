@extends('sitemanager._layouts.default')
@section('top-script')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    body {
        min-height: 75rem;
        padding-top: 4.5rem;
    }
</style>
@endsection
@section('bottom-script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('base-content')
  @include('sitemanager._layouts.navbar')
  @yield('content')
@endsection
