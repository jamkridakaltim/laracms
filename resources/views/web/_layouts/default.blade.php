@inject('web', 'App\Services\WebService')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ url('favicon.ico')}}" type="image/x-icon">
    <title>{{ $web->titlePage() }}</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    @yield('top-script')
</head>
<body class="bg-img small">
  @yield('base_content')
  @yield('bottom-script')
</body>
</html>
