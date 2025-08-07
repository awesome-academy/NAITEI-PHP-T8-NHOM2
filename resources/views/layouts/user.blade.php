<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name'))</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
  <!-- Navbar chung cho user -->
  @include('partials.navbar-user')

  <main class="flex-1 container mx-auto p-4">
    @yield('content')
  </main>

  <!-- Footer -->
  @include('partials.footer')
  
</body>
</html>
