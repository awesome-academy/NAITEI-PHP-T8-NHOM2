<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Language Switcher, Notification Bell & Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                <x-language-switcher />

                @if(Auth::user() && Auth::user()->role === 'user')
                    @php
                        $cartCount = \App\Models\Shopping_cart::where('user_id', Auth::id())->count();
                    @endphp
                    <a href="{{ route('cart.index') }}" class="relative px-3 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        @if($cartCount > 0)
                            <span class="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-600 text-xs text-white">{{ $cartCount }}</span>
                        @endif
                    </a>
                @endif

                @if(Auth::user() && Auth::user()->role === 'admin')
                    @php
                        $admin = Auth::user();
                        $unreadCount = $admin->unreadNotifications->count();
                    @endphp
                    <div class="relative">
                        <button id="notifBell" class="relative px-3 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            @if($unreadCount > 0)
                                <span class="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-600 text-xs text-white">{{ $unreadCount }}</span>
                            @endif
                        </button>
                        <div id="notifDropdown" class="hidden absolute right-0 mt-2 w-[36rem] bg-white border rounded-lg shadow-lg z-10">
                            <div class="p-3 border-b flex justify-between items-center">
                                <span class="font-bold">{{ __('common.new_notifications') }}</span>
                                <button id="clear-notifications" class="text-sm text-blue-600 hover:underline">{{ __('common.clear_all') }}</button>
                            </div>
                            <ul id="notification-list">
                                @forelse($admin->notifications as $notification)
                                    <li class="p-3 border-b @if($notification->read_at === null) bg-gray-100 @endif">
                                        @if(isset($notification->data['order_id']))
                                            <a href="{{ route('admin.orders.show', $notification->data['order_id']) }}" class="font-semibold text-blue-700">
                                                {{ __('common.new_order_notification', ['id' => $notification->data['order_id']]) }}
                                            </a>
                                            <div class="text-sm text-gray-600">
                                                {{ __('common.order_details_notification', [
                                                    'name' => $notification->data['user_name'] ?? '',
                                                    'amount' => number_format($notification->data['total_amount'], 0, ',', '.')
                                                ]) }}
                                            </div>
                                            <div class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}</div>
                                        @else
                                            <span>{{ $notification->data['message'] ?? __('common.notifications') }}</span>
                                        @endif
                                    </li>
                                @empty
                                    <li class="p-3 text-gray-500">{{ __('common.no_notifications') }}</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <script>
                        document.getElementById('notifBell').addEventListener('click', function(e) {
                            e.stopPropagation();
                            var dropdown = document.getElementById('notifDropdown');
                            dropdown.classList.toggle('hidden');

                            // Mark notifications as read
                            let unreadBadge = this.querySelector('span.absolute');
                            if (unreadBadge) {
                                fetch('{{ route("admin.notifications.markAsRead") }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    }
                                }).then(response => response.json())
                                .then(data => {
                                    if(data.status === 'success') {
                                        unreadBadge.remove();
                                    }
                                });
                            }
                        });
                        document.addEventListener('click', function(e) {
                            var btn = document.getElementById('notifBell');
                            var dropdown = document.getElementById('notifDropdown');
                            if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                                dropdown.classList.add('hidden');
                            }
                        });

                        document.getElementById('clear-notifications').addEventListener('click', function(e) {
                            e.stopPropagation();
                            if (confirm('{{ __("common.confirm") }}')) {
                                fetch('{{ route("admin.notifications.clearAll") }}', {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    }
                                }).then(response => response.json())
                                .then(data => {
                                    if(data.status === 'success') {
                                        // Replace list with "No notifications" message
                                        const list = document.getElementById('notification-list');
                                        list.innerHTML = '<li class="p-3 text-gray-500">{{ __("common.no_notifications") }}</li>';
                                        // Remove the button itself
                                        this.remove();
                                    }
                                });
                            }
                        });
                    </script>
                @endif
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('common.profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('common.profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

