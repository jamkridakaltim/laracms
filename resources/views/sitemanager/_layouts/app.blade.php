@extends('sitemanager._layouts.default')
@section('top_script')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    body {
        min-height: 75rem;
        padding-top: 4.5rem;
    }
</style>
@endsection
@section('bottom_script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('base_content')
    @yield('content')
@endsection
