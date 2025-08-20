<nav class="bg-white border-b px-6 py-3 flex items-center justify-between">
  <div class="flex items-center space-x-4">
    <button id="sidebar-toggle" class="text-gray-600 hover:text-gray-800 md:hidden">
      <!-- icon hamburger -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round"
           stroke-linejoin="round" stroke-width="2"
           d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <span class="text-xl font-bold">{{ __('common.dashboard') }}</span>
  </div>
  <div class="flex items-center space-x-4">
    <span class="text-gray-700">Xin chào, {{ Auth::user()->name }}</span>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="text-red-600 hover:text-red-800">Đăng xuất</button>
    </form>
  </div>
</nav>
