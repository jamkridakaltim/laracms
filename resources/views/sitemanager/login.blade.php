@extends('sitemanager._layouts.app')
@section('bodyClass', 'bg-img')
@section('base-content')
<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">

            <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="bg-white shadow rounded p-4">
                <div class="text-center">
                  <img src="{{ url('/images/logo-kota-samarinda.png')}}" height="128" alt="" class="mb-2">
                </div>
                <div class="mb-4">
                  {{-- <span class="font-weight-bold">Siteman </span><br> --}}
                  <span class="font-weight-bold">PEMERINTAH KOTA SAMARINDA </span><br>
                  <h1 class="h4 font-weight-bold">DINAS KOPERASI & UKM</h1>
                </div>

                {{-- @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Peringatan:
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif --}}
                <div class="form-group">
                    {{-- <label for=""><strong>Nama Pengguna</strong></label> --}}
                    <input type="text" name="username" class="form-control" placeholder="Nama Pengguna" value="{{ old('username') }}" autofocus>
                </div>
                <div class="form-group">
                    {{-- <label for=""><strong>Password</strong></label> --}}
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="text-right">
                  <button type="submit" class="btn bg-purple text-white">Masuk</button>
                </div>
            </div>
            </form>
    </div>
</div>
<div class="fixed-bottom d-block w-100 text-center mb-5">
  © {{ tahun() }} All rights reserved. &nbsp; Tim Pengembang Website {{ config('app.name') }}.
</div>
@endsection
