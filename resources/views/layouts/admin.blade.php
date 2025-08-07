<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin - '.config('app.name'))</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen">
  <!-- Sidebar -->
  @include('partials.sidebar-admin')

  <div class="flex-1 flex flex-col">
    <!-- Top navbar -->
    @include('partials.navbar-admin')

    <main class="flex-1 p-6">
      @yield('content')
    </main>
  </div>
</body>
</html>
