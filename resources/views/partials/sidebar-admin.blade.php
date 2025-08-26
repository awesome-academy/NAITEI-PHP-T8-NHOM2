<div class="w-64 bg-gray-800 text-white p-4">
    <h2 class="text-xl font-bold mb-4">{{ __('common.admin_menu') }}</h2>
    <nav>
        <ul>
            <!-- Dashboard -->
            <li class="mb-2">
                <a href="{{ route('admin.dashboard') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900' : '' }}">{{ __('common.dashboard') }}</a>
            </li>
            <!-- User Management -->
            <li class="mb-2">
                <a href="{{ route('admin.users.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.users.*') ? 'bg-gray-900' : '' }}">{{ __('common.manage_users') }}</a>
            </li>
            <!-- Product Management -->
            <li class="mb-2">
                <a href="{{ route('admin.products.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.products.*') ? 'bg-gray-900' : '' }}">{{ __('common.manage_products') }}</a>
            </li>
            <!-- Category Management -->
            <li class="mb-2">
                <a href="{{ route('admin.categories.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.categories.*') ? 'bg-gray-900' : '' }}">{{ __('common.manage_categories') }}</a>
            </li>
            <!-- Order Management -->
            <li class="mb-2">
                <a href="{{ route('admin.orders.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.orders.*') ? 'bg-gray-900' : '' }}">{{ __('common.manage_orders') }}</a>
            </li>
            <!-- Province Management -->
            <li class="mb-2">
                <a href="{{ route('admin.provinces.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.provinces.*') ? 'bg-gray-900' : '' }}">{{ __('common.manage_provinces') }}</a>
            </li>
        </ul>
    </nav>
</div>
