<nav class="bg-white shadow">
  <div class="container mx-auto px-4 py-3 flex items-center justify-between">
    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">
      {{ config('app.name') }}
    </a>

    <ul class="flex space-x-4">
      @auth
        {{-- Khi đã đăng nhập, chỉ show Dashboard và Logout --}}
        <li>
          <a href="{{ route('dashboard') }}"
             class="text-gray-600 hover:text-gray-800">
            Dashboard
          </a>
        </li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="text-gray-600 hover:text-gray-800">
              Đăng xuất
            </button>
          </form>
        </li>
      @else
        {{-- Khi chưa đăng nhập, show Login và Register (nếu có route) --}}
        <li>
          <a href="{{ route('login') }}"
             class="text-gray-600 hover:text-gray-800">
            Đăng nhập
          </a>
        </li>
        @if (Route::has('register'))
          <li>
            <a href="{{ route('register') }}"
               class="text-gray-600 hover:text-gray-800">
              Đăng ký
            </a>
          </li>
        @endif
      @endauth
    </ul>
  </div>
</nav>
