@extends('sitemanager._layouts.default')
@section('top-script')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    body {
        min-height: 50rem;
        /* padding-top: 4.5rem; */
    }
  .bg-img{
    position: relative;
    height: 100vh;
    width: 100%;
    background-image: url("/images/bg-opacity-50.jpg");
    background-size: cover;
  }
</style>
@endsection
@section('bottom-script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
<script type="application/javascript">
  $('input[type="file"]').change(function(e){
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
  });
</script>
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
      title: 'Error!',
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
