@extends('sitemanager._layouts.default')
@section('top-script')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    body {
        min-height: 75rem;
        /* padding-top: 4.5rem; */
    }
</style>
@endsection
@section('bottom-script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
  @if(session()->has('message'))
  <script>
    swal.fire({
      title: 'Berhasil!',
      text: '{!! session("message") !!}',
      icon: 'success',
      heightAuto: false,
    })
  </script>
  @endif
  @if(session()->has('error'))
  <script>
    swal.fire({
      title: 'error!',
      text: '{!! session("error") !!}',
      icon: 'error',
      heightAuto: false,
    })
  </script>
  @endif
@endsection
@section('base-content')
  @include('sitemanager._layouts.navbar')
  <main role="main" class="container pt-4">
    @yield('content')
  </main>
@endsection
