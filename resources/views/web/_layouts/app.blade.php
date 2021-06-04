@extends('web._layouts.default')
@section('top-script')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
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
<script type="text/javascript">
  function currentTime() {
    var date = new Date(); /* creating object of Date class */
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    // var midday = "AM";
    // midday = (hour >= 12) ? "PM" : "AM"; /* assigning AM/PM */
    // hour = (hour == 0) ? 12 : ((hour > 12) ? (hour - 12): hour); /* assigning hour in 12-hour format */
    hour = changeTime(hour);
    min = changeTime(min);
    sec = changeTime(sec);
    // document.getElementById("digit_clock_time").innerText = hour + " : " + min + " : " + sec + " " + midday; /* adding time to the div */
    document.getElementById("digit_clock_time").innerText = hour + ":" + min + ":" + sec; /* adding time to the div */

    var t = setTimeout(currentTime, 1000); /* setting timer */
  }

  function changeTime(k) { /* appending 0 before time elements if less than 10 */
    if (k < 10) {
      return "0" + k;
    }
    else {
      return k;
    }
  }

  currentTime();

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

@section('base_content')
  <div class="container">

    <div class="bg-white shadow">

      @include('web._layouts.header')

      @yield('top-content')

      <div class="row p-3">
        {{-- Left Pane --}}
        <div class="col-lg-8 col-sm-12">
          @yield('content')
          <img src="https://indagkop.kaltimprov.go.id/asset/foto_iklantengah/berdaulat12.jpg" class="img-fluid">
        </div>

        {{-- Right Pane --}}
        <div class="col-lg-4 col-sm-12">
          @include('web._layouts.panel-right')
        </div>

      </div>
      @include('web._layouts.footer')
    </div>
  </div>
@endsection
