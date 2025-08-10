<div class="w-64 bg-gray-800 text-white p-4">
    <h2 class="text-xl font-bold mb-4">Admin Menu</h2>
    <nav>
        <ul>
            <!-- Dashboard -->
            <li class="mb-2">
                <a href="{{ route('admin.dashboard') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900' : '' }}">Dashboard</a>
            </li>
            <!-- User Management -->
            <li class="mb-2">
                <a href="{{ route('admin.users.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.users.*') ? 'bg-gray-900' : '' }}">Manage Users</a>
            </li>
            <!-- Product Management -->
            <li class="mb-2">
                <a href="{{ route('admin.products.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.products.*') ? 'bg-gray-900' : '' }}">Manage Products</a>
            </li>
            <!-- Category Management -->
            <li class="mb-2">
                <a href="{{ route('admin.categories.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.categories.*') ? 'bg-gray-900' : '' }}">Manage Categories</a>
            </li>
            <!-- Order Management -->
            <li class="mb-2">
                <a href="#" class="block hover:bg-gray-700 p-2 rounded">Manage Orders</a>
            </li>
        </ul>
    </nav>
</div>