<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Task Manager</title>
</head>
<body class="container mx-auto my-10 max-w-lg">
  <h1 class="text-2xl mb-4">@yield('title')</h1>

  @if ( session()->has('success'))
    <p><b>{{ session('success') }}</b></p>
  @endif

  <div>@yield('content')</div>
</body>
</html>