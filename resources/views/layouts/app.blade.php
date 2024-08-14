<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tas Manager</title>
</head>
<body>
  <h1>@yield('title')</h1>

  @if ( session()->has('success'))
    <p><b>{{ session('success') }}</b></p>
  @endif

  <div>@yield('content')</div>
</body>
</html>